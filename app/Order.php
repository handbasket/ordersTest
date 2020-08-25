<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'text', 'status',
    ];

    /**
     * Returns the entity of the status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function statusModel()
    {
        return $this->hasOne('App\Status', 'name','status');
    }

    /**
     * returns the user who left the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function findByIdentityId($id)
    {
        return self::query()->where('id', '=', $id)->first();
    }

    /**
     * Adds order
     *
     * @param array $data
     * @return Order|false
     */
    public static function add(array $data)
    {
        $order = new self(self::validator($data)->validate());
        return ($order->save()) ? $order : false;
    }

    /**
     * Updates order
     *
     * @param array $data
     * @param Order $order
     * @return Order|false
     */
    public static function edit(array $data, Order $order)
    {
        foreach ($data as $key => $value){
            $order->$key = $value;
        }
        self::validator($order->toArray())->validate();
        return ($order->save()) ? $order : false;
    }

    /**
     * Returns the validation rules for an order
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private static function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'text' => ['nullable', 'string'],
            'status' => ['required', 'string', 'exists:statuses,name']
        ]);
    }
}

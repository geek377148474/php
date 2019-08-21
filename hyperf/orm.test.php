<?php


$query = \App\Models\Commerce\Order::query();

// @$getSql Closure
// $query->where();
// $getSql = function($query){
//     return vsprintf(str_replace('?', '%s', $query->toSql()), $query->getBindings());
// };

// $getSql = function($query){
//     $query = $query[0];
//     return vsprintf(str_replace('?', '%s', $query['query']), $query['bindings']);
// };
// Db::connection()->enableQueryLog(); // 开启查询日志
// $count = $query->count();
// $queries = Db::getQueryLog(); // 获取查询日志
// print_r($count);
// print_r($getSql($queries)); // 即可查看执行的sql，传入的参数等等
// die;


// @sum && @raw
// Product::where('status',1)->first(
//     array(
//         \DB::raw('SUM(profit) as profit'),
//         \DB::raw('SUM(order_count) as order_count')
//     )
// )->toArray();

// @find
// $rst = $query->find(1)->toArray();

// @where
// $rst = $query->where('id', '<=', 5)->get()->toArray();
// $rst = $query->whereRaw('id between 1 and 5')->get()->toArray();
// $rst = $query->where('id','<=',5)
//             ->where('id', '>=', 4)
//             ->get(['id','order_no'])
//             ->toArray();
// $rst = $query->whereBetween('id',[1,5])->get(['id'])->toArray();
// $rst = $query->where(['id'=>5, 'order_no'=>'1381372115806'])
//             ->get(['id','order_no'])
//             ->toArray();

// @limit
// $rst = \Hyperf\DbConnection\DB::table('commerce_order')->where('id','<=',5)
//             ->orderBy('id', 'desc')
//             ->limit(2)
//             ->get(['id','order_no'])
//             ->toArray();

// @offset
// $rst = \Hyperf\DbConnection\DB::table('commerce_order')->where('id','<=',5)
//             ->orderBy('id', 'desc')
//             ->offset(0)
//             ->limit(1)
//             ->get(['id','order_no'])
//             ->toArray();

// @join
// $rst = \Hyperf\DbConnection\DB::table('commerce_order')->where('commerce_order.id', 1)
//         ->join('common_region', 'common_region.id', '=', 'commerce_order.ship_prov')
//         ->get(['common_region.*']);

// @toSql && getBindings
// $query->where('id','<',5);
// $rst = vsprintf(str_replace('?', '%s', $query->toSql()), $query->getBindings());

// @whereIn
// $rst = $query->whereIn('id', [1,5])
//     ->get(['id'])
//     ->toArray();

// @whereOr
// $query->where('id', '=', 1)
//     ->orWhere('id', '=', 5);
// $rst = $getSql($query);
// select * from `commerce_order` where `id` = 1 or `id` = 5
// $query->where('id', '<=', 2)
//     ->where(function($query){
//         $query->where('id', 5);
//     });
// $rst = $getSql($query);
// select * from `commerce_order` where `id` <= 2 and (`id` = 5)

// @groupBy && orderBy
// $query = \Hyperf\DbConnection\DB::table('commerce_order');
// $query->limit(1);
// $query->groupBy('supplier_id','buyer_id');
// $query->orderBy('id','desc');
// $rst = $query->get(['id','supplier_id','buyer_id'])->toArray();

// @select
// $query = \App\Models\Commerce\Order::query();
// $rst = $query->whereIn('id', [1,5])
//     ->select('id','order_no')
//     ->get()
//     ->toArray();

// @addSelect
// $query = \Hyperf\DbConnection\DB::table('commerce_order');
//         $rst = $query
//             ->limit(1)
//             ->addSelect('id')
//             ->addSelect('supplier_id')
//             ->addSelect('buyer_id')
//             ->get()
//             ->toArray();
//         print_r($rst);

// @first
// $query = \Hyperf\DbConnection\DB::table('commerce_order');
// $rst = $query->whereIn('id', [1,5])
//     ->select('id','order_no')
//     ->first()
//     ->toArray();
// print_r($rst); //array
// $query = \App\Models\Commerce\Order::query();
// $rst = $query->whereIn('id', [1,5])
//     ->select('id','order_no')
//     ->first()
//     ->toArray();
// print_r($rst); //object

// @ pluck

// @$map
// $map = [];
// $map['id'] = ['>', 4];
// $map['id'] = ['<=', 5];
// $fields = ['id','order_no'];
// $rst = $query->where($map)->get($fields)->toArray();

print_r($rst);
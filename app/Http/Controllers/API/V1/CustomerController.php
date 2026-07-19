<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request;
// use App\Http\Requests\StoreCustomerRequest;
// use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Filters\V1\CustomersFilter;

class CustomerController extends Controller
{
        /**
        * Display a listing of the resource.
        */
        /* 
        * Date: June/22/2026
        * Name: Mydel-Ar Asturiano
        * Note: Comment out default result
        */
        /*
        public function index()
        {
                return new CustomerCollection(Customer::paginate());
        }
        */
        /**
        * Methods and Function format should be lowerCamelCase
        * The first word is all lowercase
        * The first letter of every subsequent word is capitalized
        *
        * <sampleFunctionName>
        * 
        * @return \Illuminate\Http\Response
        */
        public function index(Request $request)
        {
                $filter = new CustomersFilter();
                $queryItems = $filter->transform($request); //[['column','operator','value']]

                if (count($queryItems) == 0) {
                        return new CustomerCollection(Customer::paginate());
                } else {
                        $invoices = Customer::where($queryItems)->paginate();
                        return new CustomerCollection($invoices->appends($request->query()));
                }
        }

        /**
        * Show the form for creating a new resource.
        */
        public function create()
        {
                //
        }

        /**
        * Store a newly created resource in storage.
        */
        public function store(StoreCustomerRequest $request)
        {
                //
        }

        /**
        * Display the specified resource.
        */
        public function show(Customer $customer)
        {
                return new CustomerResource($customer);
        }

        /**
        * Show the form for editing the specified resource.
        */
        public function edit(Customer $customer)
        {
                //
        }

        /**
        * Update the specified resource in storage.
        */
        public function update(UpdateCustomerRequest $request, Customer $customer)
        {
                //
        }

        /**
        * Remove the specified resource from storage.
        */
        public function destroy(Customer $customer)
        {
                //
        }
}

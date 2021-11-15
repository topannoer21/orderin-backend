@extends('layouts.master_template')
    @section('content')
    <h1 class="h5">Data Products</h1>
        <p>
            {!! __('Dashboard &raquo; Products Data') !!}
        </p>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('products.create') }}" class="inline-block bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-2 rounded">
                + Create New Data
                </a>
            </div>
            <div class="">
                <table class="table-auto border-collapse border w-full rounded">
                    <thead>
                        <tr class="text-center">
                            <th class="bg-green-300 text-white border px-6 py-3">ID</th>
                            <th class="bg-green-300 text-white border px-6 py-3">Name</th>
                            <th class="bg-green-300 text-white border px-6 py-3">Price</th>
                            <th class="bg-green-300 text-white border px-6 py-3">Description</th>
                            <th class="bg-green-300 text-white border px-6 py-3">Stock</th>
                            <th class="bg-green-300 text-white border px-6 py-3">Tags</th>
                            <th class="bg-green-300 text-white border px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product as $item)
                            <tr class="bg-blue text-center">
                                <td class="border bg-white py-2">{{ $item->id }}</td>
                                <td class="border bg-white py-2">{{ $item->name }}</td>
                                <td class="border bg-white py-2">{{ $item->price }}</td>
                                <td class="border bg-white py-2">{{ $item->description }}</td>
                                <td class="border bg-white py-2">{{ $item->stock }}</td>
                                <td class="border bg-white py-2">{{ $item->tags }}</td>
                                <td class="border bg-white py-2">
                                    <a href="{{ route('products.edit', $item->id)}}" class="inline-block py-2 px-4 bg-yellow-400 text-white font-bold rounded">Edit</a>
                                    <form action="{{ route('products.destroy', $item->id) }}" method="POST" class="inline-block py-2 px-4 bg-red-400 text-white font-bold rounded">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border text-center">
                                    Data Tidak Ditemukan
                                </td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
                    <div class="text-center mt-5">
                        {{ $product->links() }}
                    </div>
            </div>
        </div>
    </div>
    @endsection
   
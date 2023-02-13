@extends('layouts.app')

@section('content')
    @include('pages.product.partials.header')

    <div class="container-fluid mt--7">
        <div class="row pb-5">

            <div class="col-xl-6 order-xl-1">
                <div class="card bg-secondary shadow">

                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">@lang('Products Register')</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="#" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">@lang('Product Details')</h6>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="name" class="form-control-label pt-3">@lang('Name')</label>
                                        <input type="text" class="form-control" id="name" placeholder="Ex: Algodão">
                                    </div>
                                    <div class="col-6">
                                        <label for="supplier" class="form-control-label pt-3">@lang('Supplier')</label>
                                        <select class="form-control" aria-label="Default select example">
                                            <option selected>@lang('Select')</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->nomeFantasia }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-6 form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                        <label class="form-control-label pt-3" for="input-name">@lang('Category')</label>
                                        <h6 class="heading-small text-muted mb-4">@lang('Select a category or add a new one')</h6>
                                        <div class="input-group">
                                            <select class="form-control form-select{{ $errors->has('category') ? ' is-invalid' : '' }}" id="category" aria-label="Example select with button addon">
                                                <option selected>@lang('Select')</option>
                                                @foreach ($categories as $category )
                                                <option value="{{ $category->id }}">{{ ucfirst(trans($category->desc)) }}</option>
                                                @endforeach
                                            </select>
                                            {{-- @dd(session('success')) --}}
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-success addCategoryButton border" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                            <i class="ni ni-fat-add"></i>
                                            </button>
                                            @if ($errors->has('category'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                            @endif

                                            <!-- Modal -->
                                            <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="categoryRegister" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <form method="POST" id="addCategory" action="{{ route('category.store') }}" >
                                                        @csrf
                                                        @method('POST')
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="categoryRegister">@lang('Register Category')</h2>
                                                        </div>
                                                        <div class="modal-body d-flex flex-row">
                                                            <div class="">
                                                                <label class="h5">@lang('Category name')</label>
                                                                    <input class="input-group-text" type="text" name="desc" id="desc">
                                                                </label>
                                                                <button type="submit" formtarget="addCategory" class="btn btn-sm btn-success my-2">@lang('Add')</button>
                                                    </form>
                                                            </div>
                                                            <div class="listCategory ml-5 mt-4">
                                                                @foreach ($categories as $category)
                                                                <div id="list_category_btnDelete" class="row">
                                                                    <form method="post" id="deleteCategory" action="{{ route('category.delete') }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden"  name="id"  value="{{ $category->id }}">
                                                                        <button type="submit" formtarget="deleteCategory" class="btn btn-danger btn-sm my-1"><i class="ni ni-fat-remove"></i></button>
                                                                        <span class="badge badge-info my-1">{{ $category->desc }}</span>
                                                                    </form>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer mt-3">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="producCode" class="form-control-label" style="padding-top: 65px;">@lang('Product Code')</label>
                                        <input type="text" class="form-control" id="producCode" placeholder="Ex: AB0000">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="costPrice" class="form-control-label pt-3">@lang('Cost price')</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="costPrice">@lang('$')</span>
                                            <input type="text" name="costPrice" id="costPrice" class="form-control pl-2" placeholder="0,00" aria-describedby="costPrice">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="salePrice" class="form-control-label pt-3">@lang('Sale price')</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="salePrice">@lang('$')</span>
                                            <input type="text" name="salePrice" id="salePrice" class="form-control pl-2" placeholder="0,00" aria-describedby="salePrice">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="profitValue" class="form-control-label pt-3">@lang('Profit')</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="profitValue">@lang('$')</span>
                                            <input type="text" disabled name="profitValue" id="profitValue" class="form-control pl-2" placeholder="0,00" aria-describedby="profitValue">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="profitPerc" class="form-control-label pt-3">@lang('Profit in %')</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="profitPerc">@lang('%')</span>
                                            <input type="text" disabled name="profitPerc" id="profitPerc" class="form-control pl-2" placeholder="0,00" aria-describedby="profitPerc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="quantity" class="form-control-label pt-3">@lang('Quantity')</label>
                                        <div class="input-group mb-3">
                                            <input type="number" name="quantity" id="quantity" class="form-control pl-2" placeholder="0,00" aria-describedby="quantity">
                                            <span class="input-group-text" id="quantity">@lang('UN')</span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="barcode" class="form-control-label pt-3">@lang('Barcode')</label>
                                        <div class="input-group mb-3">
                                            <input type="number" name="barcode" id="barcode" class="form-control pl-2" placeholder="0000000" aria-describedby="barcode">
                                        </div>
                                    </div>
                                    <div class="col-3 pl-3 pt-">
                                        <label for="status" class="form-control-label pt-3">@lang('Status')</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="status" checked>
                                            <label class="form-check-label" for="status">@lang('Active')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        @include('layouts.footers.auth')
        <script>
            $(document).ready(function(){
               $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
               $('.telefone').mask('(00) 0000-0000');
               $('.cep').mask('00000-000');
               $('.data').mask('00/00/0000');
            });
        </script>

    </div>

@endsection










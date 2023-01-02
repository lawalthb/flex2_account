<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = __('addNewItemLines'); //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>                                
                         
                    </a>
                </div>
                <div class="col col-md-auto  " >
                    <div class=" h5 font-weight-bold text-primary" >
                        {{ __('addNewItemLines') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid " >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class="card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form id="item_lines-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('item_lines.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="product_id">{{ __('productId') }} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-product_id-holder" class=" ">
                                                <select required=""  id="ctrl-product_id" data-field="product_id" name="product_id"  placeholder="{{ __('selectAValue') }}"    class="form-select" >
                                                <option value="">{{ __('selectAValue') }}</option>
                                                <?php 
                                                    $options = $comp_model->product_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('product_id', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="doc_id">{{ __('docId') }} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-doc_id-holder" class=" ">
                                                <select required=""  id="ctrl-doc_id" data-field="doc_id" name="doc_id"  placeholder="{{ __('selectAValue') }}"    class="form-select" >
                                                <option value="">{{ __('selectAValue') }}</option>
                                                <?php 
                                                    $options = $comp_model->doc_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('doc_id', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="qty">{{ __('qty') }} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-qty-holder" class=" ">
                                                <input id="ctrl-qty" data-field="qty"  value="<?php echo get_value('qty', "0.00") ?>" type="number" placeholder="{{ __('enterQty') }}" step="0.1"  required="" name="qty"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="s_price">{{ __('sPrice') }} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-s_price-holder" class=" ">
                                                <input id="ctrl-s_price" data-field="s_price"  value="<?php echo get_value('s_price', "0.00") ?>" type="number" placeholder="{{ __('enterSPrice') }}" step="0.1"  required="" name="s_price"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="amount">{{ __('amount') }} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-amount-holder" class=" ">
                                                <input id="ctrl-amount" data-field="amount"  value="<?php echo get_value('amount', "0.00") ?>" type="number" placeholder="{{ __('enterAmount') }}" step="0.1"  required="" name="amount"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="p_price">{{ __('pPrice') }} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-p_price-holder" class=" ">
                                                <input id="ctrl-p_price" data-field="p_price"  value="<?php echo get_value('p_price', "0.00") ?>" type="number" placeholder="{{ __('enterPPrice') }}" step="0.1"  required="" name="p_price"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="unit">{{ __('unit') }} </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-unit-holder" class=" ">
                                                <input id="ctrl-unit" data-field="unit"  value="<?php echo get_value('unit', "NULL") ?>" type="text" placeholder="{{ __('enterUnit') }}"  name="unit"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="comment">{{ __('comment') }} </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-comment-holder" class=" ">
                                                <input id="ctrl-comment" data-field="comment"  value="<?php echo get_value('comment', "NULL") ?>" type="text" placeholder="{{ __('enterComment') }}"  name="comment"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="doc_no">{{ __('docNo') }} </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-doc_no-holder" class=" ">
                                                <input id="ctrl-doc_no" data-field="doc_no"  value="<?php echo get_value('doc_no', "0") ?>" type="number" placeholder="{{ __('enterDocNo') }}" step="any"  name="doc_no"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="company_id">{{ __('companyId') }} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-company_id-holder" class=" ">
                                                <select required=""  id="ctrl-company_id" data-field="company_id" name="company_id"  placeholder="{{ __('selectAValue') }}"    class="form-select" >
                                                <option value="">{{ __('selectAValue') }}</option>
                                                <?php 
                                                    $options = $comp_model->company_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('company_id', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="user_id">{{ __('userId') }} <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-user_id-holder" class=" ">
                                                <select required=""  id="ctrl-user_id" data-field="user_id" name="user_id"  placeholder="{{ __('selectAValue') }}"    class="form-select" >
                                                <option value="">{{ __('selectAValue') }}</option>
                                                <?php 
                                                    $options = $comp_model->user_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('user_id', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                {{ __('submit') }}
                                <i class="material-icons">send</i>
                                </button>
                            </div>
                            <!--[form-button-end]-->
                        </form>
                        <!--[form-end]-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- Page custom css -->
@section('pagecss')
<style>

</style>
@endsection
<!-- Page custom js -->
@section('pagejs')
<script>
    
$(document).ready(function(){
	// custom javascript | jquery codes
});

</script>
@endsection

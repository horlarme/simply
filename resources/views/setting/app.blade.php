@extends('layout.app')
@section('title') Setting | {{ucwords($setting->name) }} @stop
@section('others')
    <link rel='stylesheet' href="{{ asset('public/fancybox/dist/jquery.fancybox.min.css')}}">
    <script type="text/javascript" src="{{ asset('public/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/js/main.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/fancybox/dist/jquery.fancybox.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/js/settings.js')}}"></script>
@stop
@section('pageHeader') {{ ucwords($setting->value) }} @stop
@section('pageText')
    <span class="text-info">Every Setting of this page is updated automatically when the user leave the box.</span>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">

            <form action="{{route('save.setting', $setting->name)}}" class="setting">

                <div class="form-group">
                    <h4>
                        <strong>Web Site Information</strong>
                    </h4>
                    <hr/>

                    <div class="form-group">
                        <label class="col-md-2">Name:</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="update form-control"
                                   value="{{ getApp('name') }}"/>
                            <p class="help-block">This will be the name the website displays.</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2">Description:</label>
                        <div class="col-md-10">
                            <textarea name="description" class="update form-control"
                                      rows="3" maxlength="250">{{ getApp('description') }}</textarea>
                            <p class="help-block">This describe the website for search engines. It is advised to be kept
                                at maximum of 250 characters.</p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2">Keywords:</label>
                        <div class="col-md-10">
                            <input type="text" name="keywords" class="update form-control"
                                   value="{{ getApp('keywords') }}"/>
                            <p class="help-block">Each keyword should be comma separated and should.</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2">Tag Line:</label>
                        <div class="col-md-10">
                            <input type="text" name="tagline" class="update form-control" maxlength="50"
                                   value="{{ getApp('tagline') }}"/>
                            <p class="help-block">This will be the text that serves as the motto of your website and will be by your site name.</p>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <h4><strong>User</strong></h4>
                    <hr/>

                    <div class="form-group">
                        <label class="col-md-2">Registration:</label>
                        <div class="col-md-10">
                            <select name="user.register" class="update form-control">
                                <option value="true" {{getApp('user.register') === 'true' ? 'selected' : ''}}>
                                    Yes
                                </option>
                                <option value="false" {{getApp('user.register') === 'true' ? '' : 'selected'}}>
                                    No
                                </option>
                            </select>
                            <p class="help-block">If this option is enabled, it means anybody can use
                                the {{route('register')}} to create an account as an author.</p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h4><strong>Search Engines</strong></h4>
                    <hr/>
                    <label class="col-md-2">Make your application not visible to search engines</label>
                    <div class="col-md-10">
                        <select name="search" class="update form-control">
                            <option value="true" {{getApp('search') === 'true' ? 'selected' : ''}}>
                                Yes
                            </option>
                            <option value="false" {{getApp('search') === 'true' ? '' : 'selected'}}>
                                No
                            </option>
                        </select>
                        <p class="help-block">This will make your website not to show on Google Search and other search
                            engines.</p>
                    </div>
                </div>

                <div class="form-group">
                    <h4><strong>Comments</strong></h4>
                    <hr/>
                    <label class="col-md-2">Disqus</label>
                    <div class="col-md-10">
                        <textarea name="disqus" class="update form-control" rows="3">{!! getApp('disqus')!!}</textarea>
                        <p class="help-block">For a better comment system, we choose Disqus as the service for the site
                            comment. <a href="">Click here</a> to get the code and paste into the field provided above.
                        </p>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
@stop
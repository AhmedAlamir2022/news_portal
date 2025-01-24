@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Advertisement</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Advertisement</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.advertisement.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5 class="text-primary">Home Page Advertisement</h5>

                    <div class="form-group">
                        <img src="{{ @asset($ad->home_top_bar_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">Top bar advertisement</label>
                        <input name="home_top_bar_ad" type="file" class="form-control" >
                        @error('home_top_bar_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label for="" class="mt-3">Top bar ad url</label>
                        <input name="home_top_bar_ad_url" value="{{ @$ad->home_top_bar_ad_url }}" type="text" class="form-control" >
                        @error('home_top_bar_ad_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label class="custom-switch mt-2">
                            <input
                                {{ @$ad->home_top_bar_ad_status == 1 ? 'checked' : '' }}
                                name="home_top_bar_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <img src="{{ @asset($ad->home_middle_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">Middle Ad</label>
                        <input name="home_middle_ad" type="file" class="form-control" >
                        @error('home_middle_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label for="" class="mt-3">Middle Ad Url</label>
                        <input name="home_middle_ad_url" value="{{ @$ad->home_middle_ad_url }}" type="text" class="form-control" >
                        @error('home_middle_ad_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label class="custom-switch mt-2">
                            <input
                                {{ @$ad->home_middle_ad_status == 1 ? 'checked' : '' }}
                                name="home_middle_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>

                    <h5 class="text-primary">News View Page Ads</h5>

                    <div class="form-group">
                        <img src="{{ @asset($ad->view_page_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">Bottom Ad</label>
                        <input name="view_page_ad" type="file" class="form-control" >
                        @error('view_page_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label for="" class="mt-3">Bottom Ad Url</label>
                        <input name="view_page_ad_url" value="{{ @$ad->view_page_ad_url }}"  type="text" class="form-control" >
                        @error('view_page_ad_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label class="custom-switch mt-2">
                            <input
                                {{ @$ad->view_page_ad_status == 1 ? 'checked' : '' }}
                                name="view_page_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>

                    <h5 class="text-primary">News Page Ads</h5>

                    <div class="form-group">
                        <img src="{{ @asset($ad->news_page_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">Bottom Ad</label>
                        <input name="news_page_ad" type="file" class="form-control" >
                        @error('news_page_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label for="" class="mt-3">Bottom Ad Url</label>
                        <input name="news_page_ad_url"  value="{{ @$ad->news_page_ad_url }}" type="text" class="form-control" >
                        @error('news_page_ad_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror


                        <label class="custom-switch mt-2">
                            <input
                            {{ @$ad->news_page_ad_status == 1 ? 'checked' : '' }}
                                name="news_page_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>

                    <h5 class="text-primary">Sidebar Ad</h5>

                    <div class="form-group">
                        <img src="{{ @asset($ad->side_bar_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">Sidebar Ad</label>
                        <input name="side_bar_ad" type="file" class="form-control" >
                        @error('side_bar_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label for="" class="mt-3">Sidebar Ad Url</label>
                        <input name="side_bar_ad_url" value="{{ @$ad->side_bar_ad_url }}" type="text" class="form-control" >
                        @error('side_bar_ad_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label class="custom-switch mt-2">
                            <input
                                {{ @$ad->side_bar_ad_status == 1 ? 'checked' : '' }}
                                name="side_bar_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

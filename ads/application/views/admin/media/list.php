
<div id="gallery_container" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close closemediapop" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Media Gallery</h5>
            </div>
            <div class="modal-body">
                <h6 class="text-semibold">Upload Images</h6>
                <p>
                    <input type="file" name="upload_img" class="file-input-ajax" multiple="multiple" accept="image/x-png, image/gif, image/jpeg" ></p>
                    
                <hr>
                <h6 class="text-semibold">Saved Images</h6>
                <div class="datatable-header">
                    <div class="dataTables_filter">
                        <label>
                            <span>Filter:</span>
                            <input class="form-control search_txt" type="search" placeholder="Type to filter..." >
                        </label>
                        <button class="btn btn-primary" type="button" onclick="sf()" >Search</button>
                    </div>
                    <div class="dataTables_length col-md-6" >
                        <div class="col-md-4">
                            <label>
                            <select class="form-control" name="set_modules" onchange="refreshImageList()" >
                                <option value="" >- All Categories -</option>
                            </select></label>
                        </div>
                        <div class="col-md-4">
                            <label><span></span> 
                            <select class="form-control" name="gallery_pages" class="select2" onchange="refreshImageList()" >
                                <option value="1">Page 1</option>
                            </select></label>
                        </div>
                    </div>
                </div>
                <div class="row image_list"></div>
            </div>
        </div>
    </div>
</div>


<div class="container">

<!-- <div id="navSection" data-spy="affix" class="nav  sidenav">
    <div class="sidenav-content">
        <a href="#fuSingleFile" class="active nav-link">Single File</a>
        <a href="#fuMultipleFile" class="nav-link">Multiple File</a>
         <button type="button" onclick="loadUploaderWithGallery('.txt_container', 'media_test', 'single')" class="btn btn-primary btn-icon btn-rounded"><i class="icon-upload"></i></button> 
    </div>
</div> -->

<div class="row layout-top-spacing">
<!-- 
    <div id="fuSingleFile" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Single File Upload</h4>
                    </div>      
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="custom-file-container" data-upload-id="myFirstImage">
                    <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                </div>



            </div>
        </div>
    </div> -->

    <div id="fuMultipleFile" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                      <!--   <h4>Multiple File Upload</h4> -->
<button type="button" onclick="loadUploaderWithGallery('.txt_container', 'media_test', 'single')" class="btn btn-primary btn-icon btn-rounded">Multiple File Upload</button> 
                    </div>      
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="custom-file-container" data-upload-id="mySecondImage">
                  <!--   <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label> -->
                    <label class="custom-file-container__custom-file" >

                        <input type="file" class="custom-file-container__custom-file__custom-file-input" multiple name="upload_img" accept="image/x-png, image/gif, image/jpeg">

                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />

                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                </div>



            </div>
        </div>
    </div>

</div>

</div>
</div>




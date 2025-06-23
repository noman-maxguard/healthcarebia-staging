<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/inc_head_tag.php' ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include 'includes/inc_header.php' ?>

    <?php include 'includes/inc_sidebar.php' ?>

    <!--CONTINUE--->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form role="form" action="<?= base_url() ?>admin/settings/update_pages" enctype="multipart/form-data"
                      method="post">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><?= !empty($id) ? (!empty($data->name) ? $data->name : '') : 'Create New Page' ?></h3>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" id="submit" name="submit" value="submit"
                                            class="btn btn-primary submit">Submit
                                    </button>

                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->


                                <div class="card-body">

                                    <div class="form-group">
                                        <label class="control-label">Page Name: </label>
                                        <div class="controls">
                                            <input class="form-control url_class" type="text" id="name" autofocus
                                                   autocomplete="off"
                                                   name="name"
                                                   value="<?= !empty($data->name) ? htmlentities($data->name, ENT_QUOTES) : ''; ?>">

                                        </div>

                                    </div>


                                    <?php
                                    if (!empty($id)) {
                                        ?>

                                        <!--                              <input type="hidden"  name="url" value="--><?php //= !empty($data->url)?htmlentities($data->url, ENT_QUOTES):'';
                                        ?><!--">-->


                                        <div class="form-group">
                                            <label class="control-label">URL Name: <span class="text-error">*</span>
                                                (only alphanumeric and hyphen)</label>
                                            <div class="controls">
                                                <input autocomplete="off" required class="form-control must" type="text"
                                                       name="url" id="url_edit"
                                                       value="<?= !empty($data->url) ? htmlentities($data->url, ENT_QUOTES) : ''; ?>">
                                                <span id="msg_success" style="color: green"></span>
                                                <span id="msg_error" style="color: red"></span>
                                            </div>
                                        </div>


                                        <?php
                                    } else {
                                        ?>
                                        <div class="form-group">
                                            <label class="control-label">URL Name: </label>
                                            <div class="controls">
                                                <!--                                                                <input autocomplete="off" onpaste="return false;" class="form-control page1" required type="text" name="url" id="url" >-->
                                                <span class="form-control form-control url_div"
                                                      id="url"><?= !empty($data->url) ? htmlentities($data->url, ENT_QUOTES) : ''; ?></span>
                                                <input type="hidden" id="hidden_url" name="url"
                                                       value="<?= !empty($data->url) ? htmlentities($data->url, ENT_QUOTES) : ''; ?>">
                                                <!--                                                                <span id="msg_success" style="color: green"></span>-->
                                                <!--                                                                <span id="msg_error" style="color: red"></span>-->
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <div class="form-group">
                                        <label class="control-label">View File Name: <span style="color: red">(Please enter File name without extension and be careful while editing this field !)</span></label>
                                        <div class="controls">
                                            <input class="form-control" required type="text" name="view_file_name"
                                                   value="<?= !empty($data->view_file_name) ? $data->view_file_name : '' ?>">
                                        </div>
                                    </div>


                                    <?php
                                    /*
                                       <div class="form-group">
                                        <label class="control-label">Menu Name: </label>
                                        <div class="controls">
                                            <input class="form-control"  type="text" name="menu_name" value="<?=!empty($data->menu_name)?$data->menu_name:''?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Short Name: </label>
                                        <div class="controls">
                                            <input class="form-control"  type="text" name="short_name" value="<?=!empty($data->short_name)?$data->short_name:''?>">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label">Page Title: </label>
                                        <div class="controls">
                                            <input class="form-control"  type="text" name="page_title" value="<?=!empty($data->page_title)?$data->page_title:''?>">
                                        </div>
                                    </div>


                                    <!--pageImage-->
                                    <div class="form-group">
                                        <label class="control-label">Image: <span>(For Home Page if required)</span></label>
                                        <div class="controls">
                                            <input type="file" class="change_image" id="pageImage"   name="pageImage"  accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         style="display: <?= !empty($data->pageImage) ? 'block' : 'none' ?>"
                                         id="div_pageImage">
                                        <label class="control-label"></label>
                                        <div class="controls">


                                            <img id="img_pageImage"
                                                 src="<?= !empty($data->pageImage) ? (base_url() . 'uploads/pages/'.$data->pageImage) : '' ?>"
                                                 alt='Image'
                                                 class="img-responsive">


                                            <!--Delete Image-->
                                            <a title="Remove Image" style="cursor: pointer" class="deleteImage">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <input type="hidden" name="hidden_pageImage" class="hidden_pageImage" value="0">
                                            <!--Delete Image-->
                                        </div>
                                    </div>
                                    <!--pageImage-->
                                     */
                                    ?>




                                    <?php
                                    /*
                                     <!--banner-->
                                    <div class="form-group">
                                        <label class="control-label">Banner: <span style="color: red">(1920 x 590 pixels)</span></label>
                                        <div class="controls">
                                            <input type="file" class="change_image" id="banner"   name="banner"  accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         style="display: <?= !empty($data->banner) ? 'block' : 'none' ?>"
                                         id="div_banner">
                                        <label class="control-label"></label>
                                        <div class="controls">


                                            <img id="img_banner"
                                                 src="<?= !empty($data->banner) ? (base_url() . 'uploads/pages/'.$data->banner) : '' ?>"
                                                 alt='Image'
                                                 class="img-responsive">


                                            <!--Delete Image-->
                                            <a title="Remove Image" style="cursor: pointer" class="deleteImage">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <input type="hidden" name="hidden_banner" class="hidden_banner" value="0">
                                            <!--Delete Image-->
                                        </div>
                                    </div>
                                    <!--banner-->
                                     */

                                    ?>



                                    <?php
                                    /*
                                     <div>

                                        <div class="col-md-12 col-sm-12 col-xs-12" align="center" ><h5><b><u>Block 1</u></b></h5></div><br/>


                                        <div class="form-group">
                                            <label >Active / Inactive: </label>
                                            <div class="controls">
                                                <label class="radio inline">
                                                    <input class="styled" <?= isset($data->block1_status) ? ($data->block1_status == 1 ? 'checked' : '') : 'checked' ?>
                                                           name="block1_status"  value="1"
                                                           data-prompt-position="topLeft:-1,-5"
                                                           type="radio">
                                                    Active
                                                </label>
                                                <label class="radio inline">
                                                    <input class="styled" <?= isset($data->block1_status) ? ($data->block1_status == 0 ? 'checked' : '') : '' ?>
                                                           name="block1_status"  value="0"
                                                           data-prompt-position="topLeft:-1,-5"
                                                           type="radio">
                                                    Inactive
                                                </label>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Title: </label>
                                            <div class="controls">
                                                <input class="form-control"  type="text" name="block1_title" value="<?=!empty($data->block1_title)?$data->block1_title:''?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Caption: </label>
                                            <div class="controls">
                                                <input class="form-control"  type="text" name="block1_caption" value="<?=!empty($data->block1_caption)?$data->block1_caption:''?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Description: </label>
                                            <div class="controls">
                                                <textarea rows="5" cols="5"  class="form-control textarea-big"
                                                          name="block1_description"><?=!empty($data->block1_description)?htmlentities($data->block1_description, ENT_QUOTES):''?></textarea>

                                            </div>
                                        </div>



                                        <!--block1Image-->
                                        <div class="form-group">
                                            <label class="control-label">Image: </label>
                                            <div class="controls">
                                                <input type="file" class="change_image" id="block1Image"   name="block1Image"  accept="image/*">
                                            </div>
                                        </div>

                                        <div class="form-group"
                                             style="display: <?= !empty($data->block1Image) ? 'block' : 'none' ?>"
                                             id="div_block1Image">
                                            <label class="control-label"></label>
                                            <div class="controls">


                                                <img id="img_block1Image"
                                                     src="<?= !empty($data->block1Image) ? (base_url() . 'uploads/pages/'.$data->block1Image) : '' ?>"
                                                     alt='Image'
                                                     class="img-responsive">


                                                <!--Delete Image-->
                                                <a title="Remove Image" style="cursor: pointer" class="deleteImage">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <input type="hidden" name="hidden_block1Image" class="hidden_block1Image" value="0">
                                                <!--Delete Image-->
                                            </div>
                                        </div>
                                        <!--block1Image-->


                                        <div class="form-group">
                                            <label class="control-label">Image alt text: </label>
                                            <div class="controls">
                                                <input class="form-control"  type="text" name="block1Image_alt" value="<?=!empty($data->block1Image_alt)?$data->block1Image_alt:''?>">
                                            </div>
                                        </div>


                                    </div>


                                    <div>

                                        <div class="col-md-12 col-sm-12 col-xs-12" align="center" ><h5><b><u>Block 2</u></b></h5></div><br/>

                                        <div class="form-group">
                                            <label >Active / Inactive: </label>
                                            <div class="controls">
                                                <label class="radio inline">
                                                    <input class="styled" <?= isset($data->block2_status) ? ($data->block2_status == 1 ? 'checked' : '') : '' ?>
                                                           name="block2_status"  value="1"
                                                           data-prompt-position="topLeft:-1,-5"
                                                           type="radio">
                                                    Active
                                                </label>
                                                <label class="radio inline">
                                                    <input class="styled" <?= isset($data->block2_status) ? ($data->block2_status == 0 ? 'checked' : '') : 'checked' ?>
                                                           name="block2_status"  value="0"
                                                           data-prompt-position="topLeft:-1,-5"
                                                           type="radio">
                                                    Inactive
                                                </label>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Title: </label>
                                            <div class="controls">
                                                <input class="form-control"  type="text" name="block2_title" value="<?=!empty($data->block2_title)?$data->block2_title:''?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Caption: </label>
                                            <div class="controls">
                                                <input class="form-control"  type="text" name="block2_caption" value="<?=!empty($data->block2_caption)?$data->block2_caption:''?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Description: </label>
                                            <div class="controls">
                                                <textarea rows="5" cols="5"  class="form-control textarea-big"
                                                          name="block2_description"><?=!empty($data->block2_description)?htmlentities($data->block2_description, ENT_QUOTES):''?></textarea>

                                            </div>
                                        </div>



                                        <!--block2Image-->
                                        <div class="form-group">
                                            <label class="control-label">Image: </label>
                                            <div class="controls">
                                                <input type="file" class="change_image" id="block2Image"   name="block2Image"  accept="image/*">
                                            </div>
                                        </div>

                                        <div class="form-group"
                                             style="display: <?= !empty($data->block2Image) ? 'block' : 'none' ?>"
                                             id="div_block2Image">
                                            <label class="control-label"></label>
                                            <div class="controls">


                                                <img id="img_block2Image"
                                                     src="<?= !empty($data->block2Image) ? (base_url() . 'uploads/pages/'.$data->block2Image) : '' ?>"
                                                     alt='Image'
                                                     class="img-responsive">


                                                <!--Delete Image-->
                                                <a title="Remove Image" style="cursor: pointer" class="deleteImage">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <input type="hidden" name="hidden_block2Image" class="hidden_block2Image" value="0">
                                                <!--Delete Image-->
                                            </div>
                                        </div>
                                        <!--block2Image-->


                                        <div class="form-group">
                                            <label class="control-label">Image alt text: </label>
                                            <div class="controls">
                                                <input class="form-control"  type="text" name="block2Image_alt" value="<?=!empty($data->block2Image_alt)?$data->block2Image_alt:''?>">
                                            </div>
                                        </div>


                                    </div>

                                    <div>

                                        <div class="col-md-12 col-sm-12 col-xs-12" align="center" ><h5><b><u>Block 3</u></b></h5></div><br/>


                                        <div class="form-group">
                                            <label >Active / Inactive: </label>
                                            <div class="controls">
                                                <label class="radio inline">
                                                    <input class="styled" <?= isset($data->block3_status) ? ($data->block3_status == 1 ? 'checked' : '') : '' ?>
                                                           name="block3_status"  value="1"
                                                           data-prompt-position="topLeft:-1,-5"
                                                           type="radio">
                                                    Active
                                                </label>
                                                <label class="radio inline">
                                                    <input class="styled" <?= isset($data->block3_status) ? ($data->block3_status == 0 ? 'checked' : '') : 'checked' ?>
                                                           name="block3_status"  value="0"
                                                           data-prompt-position="topLeft:-1,-5"
                                                           type="radio">
                                                    Inactive
                                                </label>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Title: </label>
                                            <div class="controls">
                                                <input class="form-control"  type="text" name="block3_title" value="<?=!empty($data->block3_title)?$data->block3_title:''?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Caption: </label>
                                            <div class="controls">
                                                <input class="form-control"  type="text" name="block3_caption" value="<?=!empty($data->block3_caption)?$data->block3_caption:''?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Description: </label>
                                            <div class="controls">
                                                <textarea rows="5" cols="5"  class="form-control textarea-big"
                                                          name="block3_description"><?=!empty($data->block3_description)?htmlentities($data->block3_description, ENT_QUOTES):''?></textarea>

                                            </div>
                                        </div>



                                        <!--block3Image-->
                                        <div class="form-group">
                                            <label class="control-label">Image: </label>
                                            <div class="controls">
                                                <input type="file" class="change_image" id="block3Image"   name="block3Image"  accept="image/*">
                                            </div>
                                        </div>

                                        <div class="form-group"
                                             style="display: <?= !empty($data->block3Image) ? 'block' : 'none' ?>"
                                             id="div_block3Image">
                                            <label class="control-label"></label>
                                            <div class="controls">


                                                <img id="img_block3Image"
                                                     src="<?= !empty($data->block3Image) ? (base_url() . 'uploads/pages/'.$data->block3Image) : '' ?>"
                                                     alt='Image'
                                                     class="img-responsive">


                                                <!--Delete Image-->
                                                <a title="Remove Image" style="cursor: pointer" class="deleteImage">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <input type="hidden" name="hidden_block3Image" class="hidden_block3Image" value="0">
                                                <!--Delete Image-->
                                            </div>
                                        </div>
                                        <!--block3Image-->


                                        <div class="form-group">
                                            <label class="control-label">Image alt text: </label>
                                            <div class="controls">
                                                <input class="form-control"  type="text" name="block3Image_alt" value="<?=!empty($data->block3Image_alt)?$data->block3Image_alt:''?>">
                                            </div>
                                        </div>


                                    </div>


                                    <div>
                                        <div class="col-md-12 col-sm-12 col-xs-12" align="center" ><h5><b><u>Additional Link</u></b></h5></div><br/>


                                        <div class="form-group">
                                            <label class="control-label">Link: </label>
                                            <div class="controls">
                                                <textarea rows="2" cols="5"  class="form-control "
                                                          name="link"><?=!empty($data->link)?htmlentities($data->link, ENT_QUOTES):''?></textarea>

                                            </div>
                                        </div>

                                    </div>
                                     */
                                    ?>


                                    <div>
                                        <div class="col-md-12 col-sm-12 col-xs-12" align="center"><h5><b><u>SEO</u></b>
                                            </h5></div>
                                        <br/>


                                        <div class="form-group">
                                            <label class="control-label">Meta Title: </label>
                                            <div class="controls">
                                                <input class="form-control" type="text" name="meta_title"
                                                       value="<?= !empty($data->meta_title) ? $data->meta_title : ''; ?>">
                                            </div>
                                        </div>


                                        <div class="form-group">

                                            <label class="control-label">Meta Description: </label>
                                            <div class="controls">
                                                <textarea class="form-control " rows="5"
                                                          name="meta_description"><?= !empty($data->meta_description) ? $data->meta_description : ''; ?></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Meta Keywords: </label>
                                            <div class="controls">
                                                <input class="form-control" type="text" name="meta_keywords"
                                                       value="<?= !empty($data->meta_keywords) ? $data->meta_keywords : ''; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group" style="text-align:right">

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="hidden" name="id"
                                                   value="<?= !empty($data->id) ? $data->id : 0 ?>">
                                            <input type="hidden" name="page_id" value="<?= !empty($id) ? $id : 0 ?>">
                                        </div>
                                    </div>


                                </div>


                                <div class="card-footer">
                                    <button type="submit" id="submit" name="submit" value="submit"
                                            class="btn btn-primary submit">Submit
                                    </button>

                                </div>


                            </div>
                            <!-- /.card -->


                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include 'includes/inc_footer.php' ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/inc_footer_scripts.php' ?>


<script>
    //Delete Image
    $('.deleteImage').click(function () {
        var x = confirm("Are you sure want to remove this image ?");
        if (x) {
            var id_str = $(this).parent().parent().prev().children().next().children().attr('id');

            $('.hidden_' + id_str).val(1);
            $('#div_' + id_str).hide();
        } else
            return false;
    })
    //Delete Image

    //File input
    $(".change_image").change(function () {

        var id = $(this).attr('id');

        displayImage(this, id);
    })

    function displayImage(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_' + id).attr('src', e.target.result);
                $('#div_' + id).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    //File input

    $(document).on('click change blur keyup', '#url_edit', function () {

        $('#msg_success').html('');
        $('#msg_error').html('');

        var id = '<?=!empty($id) ? $id : 0?>';
        var text = $(this).val();

        if (text != '') {
            var res = convertToSlug(text);
            $('#url_edit').val(res);

            $.ajax({
                type: 'post',
                url: '<?=base_url()?>admin/<?=$this->controller?>/check_url_edit',
                data: {id: id, url: res},
                success: function (jsonData) {

                    var values = $.parseJSON(jsonData);

                    var flag = values.flag;

                    if (flag < 1) {
                        $('#msg_success').html('URL Text is available');
                        $('.submit').prop('disabled', false);
                    } else {
                        $('#msg_error').html('URL Text is already taken');
                        $('.submit').prop('disabled', true);
                    }


                }
            })


        }


    })

    function convertToSlug(Text) {
        return Text
            .toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '')
            .replace(/_/g, '-')
            ;
    }


    //Slug URL
    $(document).on('change keyup paste blur', '.url_class', function () {


        var name = $('#name').val();
        var id = $('#id').val();

        $.ajax({
            type: 'post',
            url: '<?=base_url()?>admin/<?=$this->controller?>/create_slug',
            data: {id: id, name: name},
            success: function (jsonData) {

                var values = $.parseJSON(jsonData);

                var url_string = values.url_string;

                $('#hidden_url').val(url_string);

                $('#url').html(url_string);


            }
        })
    })


    // function formatString(str) {
    //     const words = str.split('-');
    //
    //     const capitalizedWords = words.map(word => {
    //         if (word.length > 0) {
    //             return word.charAt(0).toUpperCase() + word.slice(1);
    //         }
    //         return '';
    //     });
    //
    //     return capitalizedWords.join(' ');
    // }
    //
    // $(document).ready(function() {
    //     const inputString = "about-us";
    //     const formattedString = formatString(inputString);
    //
    //     $('#result').text(formattedString);
    // });
</script>

</body>
</html>

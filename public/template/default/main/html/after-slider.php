<?php
$listFindCourse = isset($this->listFindCourse) ? $this->listFindCourse : [];
$url = [
    "find" => URL::createLink("default", "index", "find", null, "tim-kiem.html")
];
?>
<section id="after-slider" class="after-slider section">
    <form action="" method="post" id="adminForm">
        <div class="awe-color bg-color-1"></div>
        <div class="after-slider-bg-2"></div>
        <div class="container">

            <div class="after-slider-content tb">
                <div class="inner tb-cell">
                    <h4>Tìm kiếm</h4>
                    <div class="course-keyword">
                        <input type="text" placeholder="Nhập từ khóa" name="form[search]" id="tags">
                    </div>
                    <!--                    <div class="mc-select-wrap">-->
                    <!--                        <div class="mc-select">-->
                    <!--                            <select class="select" name="form[find]" id="all-categories">-->
                    <!--                                <option value="0" selected>Tất cả categories</option>-->
                    <!--                                --><?php //foreach ($listFindCourse as $value) { ?>
                    <!--                                    <option value="--><?php //echo $value['id'] ?><!--"-->
                    <!--                                            name="form[find]">-->
                    <?php //echo $value['name'] ?><!--</option>-->
                    <!--                                --><?php //} ?>
                    <!--                            </select>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>
                <div class="tb-cell text-right">
                    <div class="form-actions">
                        <input type="button" value="Tìm Kiếm" class="mc-btn btn-style-1"
                               onclick="javascript:submitForm('<?php echo $url['find'] ?>')"
                        >
                    </div>
                </div>
            </div>

        </div>
    </form>
</section>
<script>
    $(function () {
        $("#tags").autocomplete({
            source: function (request, response) {
                console.log(request);
                console.log(response);
                $.ajax({
                    url: ROOT_URL + 'index.php?module=default&controller=index&action=findAutocomlete',
                    type: 'POST',
                    dataType: "json",
                    data: {param: request.term},
                    success: function (data) {
                        console.log(data);
                        $("#tags").catcomplete({
                            delay: 0,
                            source: data
                        });
                    }
                })
            }
        })
        $.widget("custom.catcomplete", $.ui.autocomplete, {
            _create: function () {
                this._super();
                this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
            },
            _renderMenu: function (ul, items) {
                var that = this,
                    currentCategory = "";
                $.each(items, function (index, item) {
                    var li;
                    if (item.category != currentCategory) {
                        ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                        currentCategory = item.category;
                    }
                    li = that._renderItemData(ul, item);
                    if (item.category) {
                        li.attr("aria-label", item.category + " : " + item.label);
                    }
                });
            }
        });

    })
</script>
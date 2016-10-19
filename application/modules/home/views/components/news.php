<?php
$model = new Gen_model;
$model->create_model('blog_articles');
$model->limit(3);
$model->db->order_by('modified');
$news = $model->get_many_by(['status' => 1]);
if (isset($news) and count($news) > 0):
    ?>
    <?php ?>
    <style type="text/css">
        .news-header{
            border-bottom: 1px solid #eee;

        }
        .news-div{
            background-color: #fbf7f3;
            margin-top: 20px;
            padding:7px;

        }
        .news-body{
            width:100%;
            overflow: hidden;
        }
    </style>
    <div class="container-fluid"> 
        <div class="news-div">
            <div class="news-header">
                <h3>latest news</h3>
            </div>
            <div class="row">

                <?php foreach ($news as $one): ?>
                    <div class="col-md-4">
                        <div class="newfs-header">
                            <h4><?php echo $one->title ?></h4>
                        </div>
                        <div class="news-body">
                            <p>
                                <?php
                                $this->load->helper('text');
//                                $this->load->helper('security');
                                echo character_limiter(($one->body), 300)
                                ?>

                            </p>
                            <a class="btn btn-info pull-right" href="<?php echo site_url('articles/viewart/' . $one->id) ?>">Read More</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

<?php endif; ?>
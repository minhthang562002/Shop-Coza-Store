<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
    die;
}
if (isset($_GET['thongbao'])) {
    $thongbao = $_GET['thongbao'];
    echo '<script type="text/javascript">
  
  window.onload = function () { alert("' . $thongbao . '"); }
  </script>';
}
include "header.php";
include "../dao/pdo.php";
include "../dao/users.php";
include "../dao/products.php";
include "../dao/categories.php";
include "../dao/tags.php";
include "../dao/product_detail.php";
include "../dao/colors.php";
include "../dao/sizes.php";
include "../dao/blogs.php";
include "../dao/reviews.php";
include "../dao/comments.php";
include "../dao/product_img.php";
include "../dao/contact.php";
include "../dao/cart.php";
$dhs = dh_select_all();
$products = products_select_all();
extract($products);
$listcate = category_select_all();
extract($listcate);
$tags = tag_select_all();
extract($tags);
$sizes = size_select_all();
extract($sizes);
$colors = color_select_all();
extract($colors);
$users = user_select_all();
extract($users);
$blogs = blog_select_all();
extract($blogs);
$contacts = contact_select_all();
extract($contacts);
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'addproduct':
            //kiểm tra người dùng có nhập nút add hay không
            if (isset($_POST['btn_insert']) && ($_POST['btn_insert'])) {
                $product_name = $_POST["product_name"];
                $product_price = $_POST["product_price"];
                $file = $_FILES['product_img'];
                $product_img = $file['name'];
                $product_sale = $_POST["product_sale"];
                $product_posting_date = $_POST["product_posting_date"];
                $product_desciption = $_POST["product_desciption"];
                $tag_id = $_POST["tag_id"];
                $cate_id = $_POST["cate_id"];
                if ($product_name == "") {
                    $errors['product_name'] = "Tên không được để trống";
                }
                if ($product_price <= 0) {
                    $errors['product_price'] = "Giá không hợp lệ";
                }
                if ($product_sale < 0) {
                    $errors['product_sale'] = "Giảm giá không hợp lệ";
                }
                if ($product_posting_date == "") {
                    $errors['product_posting_date'] = "Ngày đăng không hợp lệ";
                }
                if ($product_desciption == "") {
                    $errors['product_desciption'] = "Mô tả không hợp lệ";
                }
                if ($file['size'] <= 0) {
                    $errors['product_img'] = "Bạn cần nhập ảnh";
                } else {
                    $img = ['jpg', 'png', 'gif'];
                    //Lấy phần mở rộng của file
                    $ext = pathinfo($product_img, PATHINFO_EXTENSION);
                    //Kiểm tra xem $ext có trong $img không
                    if (!in_array($ext, $img)) {
                        $errors['blog_img'] = "File không phải là ảnh";
                    }
                }
                if (!isset($errors)) {
                    products_insert($product_name, $product_price, $product_img, $product_sale, $product_posting_date, $tag_id, $cate_id, $product_desciption);
                    move_uploaded_file($file['tmp_name'], '../upload/' . $product_img);
                    $thongbao = "Thêm thành công";
                    header("location: index.php?act=products&thongbao=$thongbao");
                } else {
                    $file = $_FILES['product_img'];
                    $product_img = $file['name'];
                    include "products/product/add.php";
                }
            } else {
                include "products/product/add.php";
            }
            break;
        case 'products':
            $products = products_select_all();
            include "products/product/list.php";
            break;
            break;
        case 'delpro':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
                review_delete_product($product_id);
                product_detail_delete($product_id);
                productimage_delete_product($product_id);
                products_delete($product_id);
                $thongbao = "Xóa thành công";
            }
            $products = products_select_all();
            header("location: index.php?act=products&thongbao=$thongbao");
            break;
        case 'updatepro':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
                $product = products_select_by_id($product_id);
                extract($product);
            }
            include "products/product/update.php";
            break;
        case 'updateproduct':
            //kiểm tra người dùng có nhập nút update hay không
            if (isset($_POST['update']) && ($_POST['update'])) {
                $product_name = $_POST["product_name"];
                $product_price = $_POST["product_price"];
                $file = $_FILES['product_img'];
                $product_img = $file['name'];
                $product_sale = $_POST["product_sale"];
                $product_posting_date = $_POST["product_posting_date"];
                $product_desciption = $_POST["product_desciption"];
                $tag_id = $_POST["tag_id"];
                $cate_id = $_POST["cate_id"];
                $product_id = $_POST["product_id"];
                if ($product_name == "") {
                    $errors['product_name'] = "Tên không được để trống";
                }
                if ($product_price <= 0) {
                    $errors['product_price'] = "Giá không hợp lệ";
                }
                if ($product_sale < 0) {
                    $errors['product_sale'] = "Giảm giá không hợp lệ";
                }
                if ($product_posting_date == "") {
                    $errors['product_posting_date'] = "Ngày đăng không hợp lệ";
                }
                if ($product_desciption == "") {
                    $errors['product_desciption'] = "Mô tả không hợp lệ";
                }
                if ($file['size'] > 0) {
                    $img = ['jpg', 'png', 'gif'];
                    //Lấy phần mở rộng của file
                    $ext = pathinfo($product_img, PATHINFO_EXTENSION);
                    //Kiểm tra xem $ext có trong $img không
                    if (!in_array($ext, $img)) {
                        $errors['product_img'] = "File không phải là ảnh";
                    }
                } else {
                    $product_img = $_POST['product_img'];
                }
                if (!isset($errors)) {
                    products_update($product_id, $product_name, $product_price, $product_img, $product_sale, $product_posting_date, $tag_id, $cate_id, $product_desciption);
                    move_uploaded_file($file['tmp_name'], '../upload/' . $product_img);
                    $thongbao = "Cập nhật thành công";
                    header("location: index.php?act=products&thongbao=$thongbao");
                } else {
                    $product_img = $_POST['product_img'];
                    include "products/product/update.php";
                }
            }
            break;

        case 'colors_btn_add':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $color_name = $_POST['color_name'];
                if ($color_name == '') {
                    $errors['color_name'] = 'Tên màu không được bỏ trống, mời nhập';
                }
                if (!isset($errors)) {
                    color_create($color_name);
                    $colors = color_select_all();
                    extract($colors);
                    $thongbao = 'Thêm dữ liệu thành công';
                    include 'products/colors/list.php';
                } else {
                    include 'products/colors/add.php';
                }
            } else {
                include 'products/colors/add.php';
            }
            break;
        case "colors_btn_delete":
            $id_color = $_GET['color_id'];
            color_delete($id_color);
            header('location: index.php?act=color_list');

            break;
        case 'color_list':
            $colors = color_select_all();
            extract($colors);
            include 'products/colors/list.php';
            break;
        case 'colors_btn_edit':
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $color_id = $_POST['color_id'];
                $color_name = $_POST['color_name'];
                color_edit($color_name, $color_id);
                $thongbao = 'Cập nhật dữ liệu thành công';
                $colors = color_select_all();
                extract($colors);
                include 'products/colors/list.php';
            } else {
                $color_id = $_GET['color_id'];
                $color = color_select_by_id($color_id);
                extract($color);
                include 'products/colors/update.php';
            }

            break;
        case "sizes_btn_add":
            if (isset($_POST['btn_insert']) && ($_POST['btn_insert'])) {
                $size_name = $_POST['size_name'];

                if (strlen($size_name) == 0) {
                    $errors['size_name'] = 'Tên size không được bỏ trống, mời nhập';
                }

                if (!isset($errors)) {
                    size_create($size_name);
                    $thongbao = 'Thêm dữ liệu thành công';
                    $sizes = size_select_all();
                    extract($sizes);
                    include 'products/sizes/list.php';
                } else {
                    include 'products/sizes/add.php';
                }
            } else {
                include 'products/sizes/add.php';
            }
            break;
        case "sizes_btn_list":
            $sizes = size_select_all();
            extract($sizes);
            include 'products/sizes/list.php';
            break;
        case "sizes_btn_edit":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $size_id = $_POST['size_id'];
                $size_name = $_POST['size_name'];

                size_edit($size_name, $size_id);
                $thongbao = 'Cập nhật dữ liệu thành công';
                header("location: index.php?act=sizes_btn_list&thongbao=$thongbao");
            } else {
                $size_id = $_GET['size_id'];
                $size = size_select_by_id($size_id);
                extract($size);
                include 'products/sizes/update.php';
            }
            break;
        case "sizes_btn_delete":
            $size_id = $_GET['size_id'];
            size_delete($size_id);
            $thongbao = 'Xóa dữ liệu thành công';
            $sizes = size_select_all();
            extract($sizes);
            include 'products/sizes/list.php';
            break;

            // Tags
        case "tags_btn_add":
            if (isset($_POST['btn_insert']) && ($_POST['btn_insert'])) {
                $tag_name = $_POST['tag_name'];

                if (strlen($tag_name) == 0) {
                    $errors['tag_name'] = 'Tên tag không được bỏ trống, mời nhập';
                }

                if (!isset($errors)) {
                    tag_insert($tag_name);
                    $thongbao = 'Thêm dữ liệu thành công';
                    header("location: index.php?act=tags_btn_list&thongbao=$thongbao");
                } else {
                    include 'products/tags/add.php';
                }
            } else {
                include 'products/tags/add.php';
            }
            break;
        case "tags_btn_list":
            $tags = tag_select_all();
            extract($tags);
            include 'products/tags/list.php';
            break;
        case "tags_btn_edit":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $tag_id = $_POST['tag_id'];
                $tag_name = $_POST['tag_name'];

                tag_update($tag_id, $tag_name);
                $thongbao = 'Cập nhật dữ liệu thành công';
                header("location: index.php?act=tags_btn_list&thongbao=$thongbao");
            } else {
                $tag_id = $_GET['tag_id'];
                $tag = tag_select_by_id($tag_id);
                extract($tag);
                include 'products/tags/update.php';
            }
            break;
        case "tags_btn_delete":
            $tag_id = $_GET['tag_id'];
            tag_delete($tag_id);
            $thongbao = 'Xóa dữ liệu thành công';
            header("location: index.php?act=tags_btn_list&thongbao=$thongbao");
            break;

            //Category
        case "addcategory":
            if (isset($_POST['btn_insert']) && ($_POST['btn_insert'])) {
                $cate_name = $_POST['cate_name'];
                $file = $_FILES['cate_img'];
                $cate_img = $file['name'];

                if ($cate_name == "") {
                    $errors['cate_name'] = "Tên không được để trống";
                }

                if ($file['size'] <= 0) {
                    $errors['cate_img'] = "Bạn cần nhập ảnh";
                } else {
                    $img = ['jpg', 'png', 'gif'];
                    //Lấy phần mở rộng của file
                    $ext = pathinfo($cate_img, PATHINFO_EXTENSION);
                    //Kiểm tra xem $ext có trong $img không
                    if (!in_array($ext, $img)) {
                        $errors['cate_img'] = "File không phải là ảnh";
                    }
                }
                if (!isset($errors)) {
                    category_insert($cate_name, $cate_img);
                    move_uploaded_file($file['tmp_name'], '../upload/' . $cate_img);
                    $thongbao = "Thêm thành công";
                    header("location: index.php?act=listcategory&thongbao=$thongbao");
                } else {
                    $cate_img = $_POST['cate_img'];
                    include "categories/add.php";
                }
            } else {
                include "categories/add.php";
            }
            break;

        case "listcategory":
            include "categories/list.php";
            break;

        case "updatecategory":
            if (isset($_POST['updatecategory']) && ($_POST['updatecategory'])) {
                $cate_id = $_POST['cate_id'];
                $cate_name = $_POST['cate_name'];
                $file = $_FILES['cate_img'];
                $cate_img = $file['name'];
                if ($cate_name == "") {
                    $errors['cate_name'] = "Tên không được để trống";
                }

                if ($file['size'] > 0) {
                    $img = ['jpg', 'png', 'gif'];
                    //lấy tên ảnh mới
                    $image = $file['name'];
                    //Lấy phần mở rộng của file
                    $ext = pathinfo($image, PATHINFO_EXTENSION);
                    //Kiểm tra xem $ext có trong $img không
                    if (!in_array($ext, $img)) {
                        $errors['cate_img'] = "File không phải là ảnh";
                    }
                } else {
                    $cate_img = $_POST['cate_img'];
                }

                if (!isset($errors)) {
                    category_update($cate_id, $cate_name, $cate_img);
                    move_uploaded_file($file['tmp_name'], '../upload/' . $cate_img);
                    $thongbao = "Cập nhật thành công";
                    header("location: index.php?act=listcategory&thongbao=$thongbao");
                } else {
                    $cate_img = $_POST['cate_img'];
                    include "categories/update.php";
                }
            } else {
                $cate_id = $_GET['cate_id'];
                $cate = category_select_by_id($cate_id);
                extract($cate);
                include 'categories/update.php';
            }
            break;
        case "delcategory":
            $cate_id = $_GET['cate_id'];
            category_delete($cate_id);
            $thongbao = 'Xóa dữ liệu thành công';
            header("location: index.php?act=listcategory&thongbao=$thongbao");
            break;
        case "users":
            include "users/list.php";
            break;
        case "add_blog":
            if (isset($_POST['btn_insert']) && ($_POST['btn_insert'])) {
                extract($_SESSION["user"]);
                $blog_title = $_POST["blog_title"];
                $blog_content = $_POST["blog_content"];
                $file = $_FILES['blog_img'];
                $blog_img = $file['name'];
                $blog_post_date = $_POST["blog_post_date"];
                if ($blog_title == "") {
                    $errors['blog_title'] = "Tiêu không được để trống";
                }
                if ($blog_content == "") {
                    $errors['blog_content'] = "Nội dung không được trống";
                }
                if ($blog_post_date == "") {
                    $errors['blog_post_date'] = "Ngày đăng không hợp lệ";
                }
                if ($file['size'] <= 0) {
                    $errors['blog_img'] = "Bạn cần nhập ảnh";
                } else {
                    $img = ['jpg', 'png', 'gif'];
                    //Lấy phần mở rộng của file
                    $ext = pathinfo($blog_img, PATHINFO_EXTENSION);
                    //Kiểm tra xem $ext có trong $img không
                    if (!in_array($ext, $img)) {
                        $errors['blog_img'] = "File không phải là ảnh";
                    }
                }
                if (!isset($errors)) {
                    blog_insert($blog_title, $blog_content, $blog_img, $blog_post_date, $user_id);
                    move_uploaded_file($file['tmp_name'], '../upload/' . $blog_img);
                    $thongbao = "Thêm thành công";
                    header("location: index.php?act=blogs&thongbao=$thongbao");
                } else {
                    $file = $_FILES['blog_img'];
                    $blog_img = $file['name'];
                    include "blogs/add.php";
                }
            } else {

                include "blogs/add.php";
            }
            break;
        case "blogs":
            include "blogs/list.php";
            break;
        case "updateblog":
            if (isset($_POST['updateblog']) && ($_POST['updateblog'])) {
                extract($_SESSION["user"]);
                $blog_title = $_POST["blog_title"];
                $blog_content = $_POST["blog_content"];
                $file = $_FILES['blog_img'];
                $blog_img = $file['name'];
                $blog_id = $_POST['blog_id'];
                $blog_post_date = $_POST["blog_post_date"];
                if ($blog_title == "") {
                    $errors['blog_title'] = "Tiêu không được để trống";
                }
                if ($blog_content == "") {
                    $errors['blog_content'] = "Nội dung không được trống";
                }
                if ($blog_post_date == "") {
                    $errors['blog_post_date'] = "Ngày đăng không hợp lệ";
                }
                if ($file['size'] > 0) {
                    $img = ['jpg', 'png', 'gif'];
                    //Lấy phần mở rộng của file
                    $ext = pathinfo($blog_img, PATHINFO_EXTENSION);
                    //Kiểm tra xem $ext có trong $img không
                    if (!in_array($ext, $img)) {
                        $errors['blog_img'] = "File không phải là ảnh";
                    }
                } else {
                    $blog_img = $_POST['blog_img'];
                }
                if (!isset($errors)) {
                    blog_update($blog_id, $blog_title, $blog_content, $blog_img, $blog_post_date, $user_id);
                    move_uploaded_file($file['tmp_name'], '../upload/' . $blog_img);
                    $thongbao = "Cập nhật thành công";
                    header("location: index.php?act=blogs&thongbao=$thongbao");
                } else {
                    $blog_img = $_POST['blog_img'];
                    include "blogs/update.php";
                }
            } else {
                $blog_id = $_GET['blog_id'];
                $blog = blog_select_by_id($blog_id);
                extract($blog);
                include 'blogs/update.php';
            }
            break;
        case "delblog":
            $blog_id = $_GET['blog_id'];
            comment_delete_blog($blog_id);
            blog_delete($blog_id);
            $thongbao = 'Xóa dữ liệu thành công';
            header("location: index.php?act=blogs&thongbao=$thongbao");
            break;
        case "reviewspro":
            include "reviews/product.php";
            break;
        case "reviews":
            $product_id = $_GET['product_id'];
            $reviews = review_select_by_product($product_id);
            include "reviews/reviews.php";
            break;
        case "delreview":
            $review_id = $_GET['review_id'];
            $product_id = $_GET['product_id'];
            review_delete($review_id);
            $thongbao = 'Xóa dữ liệu thành công';
            header("location: index.php?act=reviews&product_id=$product_id&thongbao=$thongbao");
            break;
        case "commentsblogs":
            include "comments/blog.php";
            break;
        case "comments":
            $blog_id = $_GET['blog_id'];
            $comments = comment_select_by_blog($blog_id);
            include "comments/list.php";
            break;
        case "delcomment":
            $comment_id = $_GET['comment_id'];
            $blog_id = $_GET['blog_id'];
            comment_delete($comment_id);
            $thongbao = 'Xóa dữ liệu thành công';
            header("location: index.php?act=comments&blog_id=$blog_id&thongbao=$thongbao");
            break;
        case "addimage_product":
            if (isset($_POST['btn_insert']) && ($_POST['btn_insert'])) {
                $file = $_FILES['product_img'];
                $product_img = $file['name'];
                $product_id = $_GET['product_id'];

                if ($file['size'] <= 0) {
                    $errors['product_img'] = "Bạn cần nhập ảnh";
                } else {
                    $img = ['jpg', 'png', 'gif'];
                    //Lấy phần mở rộng của file
                    $ext = pathinfo($product_img, PATHINFO_EXTENSION);
                    //Kiểm tra xem $ext có trong $img không
                    if (!in_array($ext, $img)) {
                        $errors['product_img'] = "File không phải là ảnh";
                    }
                }
                if (!isset($errors)) {
                    productimage_insert($product_img, $product_id);
                    move_uploaded_file($file['tmp_name'], '../upload/' . $product_img);
                    $thongbao = " Thêm thành công";
                    header("location: index.php?act=listimage_product&product_id=$product_id&thongbao=$thongbao");
                } else {
                    $product_id = $_GET['product_id'];
                    include 'products/product_image/add.php';
                }
            } else {
                $product_id = $_GET['product_id'];
                include 'products/product_image/add.php';
            }
            break;

        case "listimage_product":
            $product_id = $_GET['product_id'];
            $listimgs = productimage_select_by_pro($product_id);
            include 'products/product_image/list.php';
            break;
        case "delimg_product":
            $product_img_id = $_GET['product_img_id'];
            $product_id = $_GET['product_id'];
            productimage_delete($product_img_id);
            $thongbao = 'Xóa dữ liệu thành công';
            header("location: index.php?act=listimage_product&product_id=$product_id&thongbao=$thongbao");
            break;

        case "list_product":
            include 'products/product_image/list_product.php';
            break;


        case "updateimg_product":
            if (isset($_POST['updateimg_product']) && ($_POST['updateimg_product'])) {
                $file = $_FILES['product_img'];
                $product_img = $file['name'];
                $product_img_id = $_GET['product_img_id'];
                $product_id = $_GET['product_id'];
                if ($file['size'] > 0) {
                    $img = ['jpg', 'png', 'gif'];
                    //lấy tên ảnh mới
                    $image = $file['name'];
                    //Lấy phần mở rộng của file
                    $ext = pathinfo($image, PATHINFO_EXTENSION);
                    //Kiểm tra xem $ext có trong $img không
                    if (!in_array($ext, $img)) {
                        $errors['product_img'] = "File không phải là ảnh";
                    }
                }
                if (!isset($errors)) {
                    productimage_update($product_img_id, $product_img, $product_id);
                    move_uploaded_file($file['tmp_name'], '../upload/' . $product_img);
                    $thongbao = "Cập nhật thành công";
                    header("location: index.php?act=listimage_product&product_id=$product_id&thongbao=$thongbao");
                } else {
                    $file = $_FILES['product_img'];
                    $product_img = $file['name'];
                    $product_id = $_GET['product_id'];
                    include 'products/product_image/update.php';
                }
            } else {
                $product_id = $_GET['product_id'];
                $product_img_id = $_GET['product_img_id'];
                $listimg = productimage_select_by_id($product_img_id);
                extract($listimg);
                include 'products/product_image/update.php';
            }
            break;
        case "contact":
            include "contact/list.php";
            break;
        case "dh":
            include "dh/list.php";
            break;
        case "status_update":
            $order_id = $_GET['order_id'];
            dh_edit_order_id("2", $order_id);
            header("location: http://localhost/cozastore/admin/index.php?act=dh");
            break;
        case "dh_detail":
            $order_id = $_GET['order_id'];
            $carts=cart_select_by_order_id($order_id);
            include "dh/dh_detail.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";

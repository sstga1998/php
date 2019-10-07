<?php include_once("header.php")?>
<?php include_once("nav.php")?>

<?php 
#code bài số 4
include_once("book.php");
//$ls = Book::getList();
//$keyWord=null;
//$keyWord =$_REQUEST['search'];
$books = Book::getList1($_REQUEST['search']);
//$lsFromFile = Book::getList();
//$book = new Book(1, "OOP in PHP",50, "ndungithue", 2019);
//$book->display();

//$listBook = $book::getList();
//var_dump($listBook);
?>

<div class="container" >
<button class="btn btn-outline-info float-right"><i class="fas fa-plus-circle"></i> Thêm</button>
    <form action="" method="GET">
        <div class="form-group">
            <input class="form-control" name="search"  style="max-width: 200px; display:inline-block;" placeholder="Search">
            <button type="submit" class="btn btn-default" style="margin-left:-50px"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <div class="row">
        <table class ="table table-bordered" >
            <thead class="thead-dark" align="center">
                <tr>
                    <th colspan="1"> STT</th>
                    <th colspan="2"> Title</th>
                    <th colspan="2"> Price</th>
                    <th colspan="2"> Author</th>
                    <th colspan="2">Year</th>
                    <th colspan="6"> Thao tác </th  >
                 
              
                  </tr>
             </thead>
            <tbody align="center">
               <?php 
               //độ dài list ls
               // count($ls);
    
               foreach ($lsFromFile as $key => $value) {
                ?>
               <tr>
                    <th colspan="1"><?php echo $key ?></th>
                    <td colspan="2"><?php echo $value->title ?></td>
                    <td colspan="2"><?php echo $value->price?></td>
                    <td colspan="2"><?php echo $value->author ?></td>
                    <td colspan="2"> <?php echo $value->year ?></td> 
                    <td> <button class="btn btn-outline-warning" name="BtnEdit1" ><i class="fas fa-edit"></i>Sửa </button>
                    <button class="btn btn-outline-danger" nanme="BtnDelete1"><i class="fas fa-trash-alt"></i>Xóa </button>
                    </td>
               </tr>
               <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once("footer.php")?>

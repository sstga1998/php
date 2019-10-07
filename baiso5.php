<?php 
    include_once('header.php');
    include_once('nav.php');
    
    //$books = Book::getList1($_REQUEST['search']);
?>
<?php 
include_once('book.php');
$id = $title = $search = "";
	if (isset($_REQUEST["addBook"])) {
		$id = $_REQUEST["id"];
		$title = $_REQUEST["title"];
		$price = $_REQUEST["price"];
		$author = $_REQUEST["author"];
		$year = $_REQUEST["year"];
		$content = $id . "#" . $title . "#" . $price . "#" . $author . "#" . $year;		
		book::AddToFile($content);
		//echo "<meta http-equiv='refresh' content='0'>";
	}
$book = new Book(1,50, "Kỵ sỹ bóng đêm - Joker", "ducnghia69", 2019);
// $book->display();
    $ls = $book::getListFromFile();
?>
<div class="container pt-5">
    <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#addBook"><i class="fas fa-plus-circle"></i> Thêm</button>
    <form action="" method="GET">
        <div class="form-group">
            <input class="form-control" name="search"  style="max-width: 200px; display:inline-block;" placeholder="Search">
            <button type="submit" class="btn btn-default" style="margin-left:-50px"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Title</th>
                <th>Price</th>
                <th>Author</th>
                <th>Year</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($books as $key => $value){
            ?>
            <tr>
                <td><?php echo $key ?></td>
                <td><?php echo $value->title?></td>
                <td><?php echo $value->price?></td>
                <td><?php echo $value->author?></td>
                <td><?php echo $value->year?></td>
                <td>
                    <button class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i> Edit</button>
                    <button class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                </td>
            </tr>    
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="editBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<legend>Edit Book </legend>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<fieldset>
						<div class="form-group d-flex">
							<label class="pt-1 col-md-2 control-label" for="Title">Title</label>
							<div class="col-md-10">
								<input id="Title" name="Title" type="text" placeholder="Title" class="form-control input-md">
							</div>
						</div>
						<div class="form-group d-flex">
							<label class="pt-1 col-md-2 control-label" for="Title">Price</label>
							<div class="col-md-10">
								<input id="Title" name="Title" type="text" placeholder="Title" class="form-control input-md">
							</div>
						</div>
						<!-- Select Basic -->
						<div class="form-group d-flex">
							<label class="pt-1 col-md-2 control-label" for="Year">Year</label>
							<div class="col-md-10">
								<select id="Year" name="Year" class="form-control">
									<option value="2019">2019</option>
									<option value="2018">2018</option>
									<option value="2017">2017</option>
									<option value="2016">2016</option>
									<option value="2015">2015</option>
									<option value="2014">2014</option>
									<option value="2013">2013</option>
									<option value="2012">2012</option>
									<option value="2011">2011</option>
									<option value="2010">2010</option>
								</select>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group d-flex">
							<label class="pt-1 col-md-2 control-label" for="Author">Author</label>
							<div class="col-md-10">
								<input id="Author" name="Author" type="text" placeholder="Author" class="form-control input-md">

							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-outline-success col-md-2" type="button" data-dismiss="modal">Edit</button>
				<button class="btn btn-outline-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<legend>Add Book </legend>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="addForm" method="POST">
					<fieldset>
					<div class="form-group d-flex">
							<label class="pt-1 col-md-2 control-label" for="Title">ID</label>
							<div class="col-md-10">
								<input id="id" name="id" type="text" placeholder="ID" class="form-control input-md">
							</div>
						</div>
						<div class="form-group d-flex">
							<label class="pt-1 col-md-2 control-label" for="Title">Title</label>
							<div class="col-md-10">
								<input id="Title" name="Title" type="text" placeholder="Title" class="form-control input-md">
							</div>
						</div>
						<div class="form-group d-flex">
							<label class="pt-1 col-md-2 control-label" for="Title">Price</label>
							<div class="col-md-10">
								<input id="Title" name="Price" type="text" placeholder="Price" class="form-control input-md">
							</div>
						</div>
						<!-- Select Basic -->
						<div class="form-group d-flex">
							<label class="pt-1 col-md-2 control-label" for="Year">Year</label>
							<div class="col-md-10">
								<select id="Year" name="Year" class="form-control">
									<option value="2019">2019</option>
									<option value="2018">2018</option>
									<option value="2017">2017</option>
									<option value="2016">2016</option>
									<option value="2015">2015</option>
									<option value="2014">2014</option>
									<option value="2013">2013</option>
									<option value="2012">2012</option>
									<option value="2011">2011</option>
									<option value="2010">2010</option>
								</select>
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group d-flex">
							<label class="pt-1 col-md-2 control-label" for="Author">Author</label>
							<div class="col-md-10">
								<input id="Author" name="Author" type="text" placeholder="Author" class="form-control input-md">

							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" name="addBook" class="btn btn-outline-success col-md-2" form="addForm" value="Submit">Submit</button>
				<!-- <button type="submit" form="addForm" class="btn btn-outline-success col-md-2" data-dismiss="modal">Add</button> -->
				<button class="btn btn-outline-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<?php 
    include_once('footer.php');
?>
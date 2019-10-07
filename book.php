<?php 
class Book {
    #Begin properties
    var $id;
    var $price;
    var $title;
    var $author;
    var $year;
    #end properties
    function __construct($id, $title,$price, $author, $year)
    {   //var $price;
        $this->id = $id;
        $this->price = $price;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }
    #member funtion
    function display (){
        echo "Price:". $this->price ."<br>";
        echo "Title:". $this->title ."<br>";
        echo "Author:". $this->author ."<br>";
        echo "Year:". $this->year ."<br>";
    }
    #Mock data
    /**
     * Lấy toàn bộ các cuốn sách có trong CSDL
     */
    // static function getList(){
    //     $listBook = array();
    //     array_push($listBook, new Book(1, "OOP in PHP",5,"ndung", 2015)); //đẩy một phần tử vào mảng
    //     array_push($listBook, new Book(2, "OOP in C#",6,"nha", 2016));
    //     array_push($listBook, new Book(3, "OOP in Java",10,"ntrung", 2017));
    //     array_push($listBook, new Book(4, "OOP in Python",15,"nlan", 2018));
    //     array_push($listBook, new Book(5, "OOP in Rails",25,"thomas", 2019));
    //     return $listBook;
    // }
    /**Lấy dữ liệu từ file */
    // static function getListFromFile()
    // {
    //     $arrData = file("data/book.txt");
    //     $lsBook = array();
    //     foreach ($arrData as $key => $value)
    //     {
    //         $arrItem = explode("#",$value);
    //         if (count($arrData)==5){
    //             $book = new Book($arrItem[0],$arrItem[2], $arrItem[1], $arrItem[3],$arrItem[4]);
    //             array_push($lsBook, $book);
    //         }
    //     };
    //     return $lsBook;
    // }
    static function getList1($search = null){
        $data = file("data/book.txt",FILE_SKIP_EMPTY_LINES);
        $arrBook = [];
        foreach($data as $key => $value){
            $row = explode("#",$value);
            if(
                strlen(strstr($row[0],$search)) || strlen(strstr($row[3],$search)) ||
                strlen(strstr($row[1],$search)) || strlen(strstr($row[4],$search)) ||
                strlen(strstr($row[2],$search)) || $search == null
            )
            $arrBook[] = new Book($row[0],$row[2],$row[1],$row[3],$row[4]);
        }
        return $arrBook;
    }
    // static function AddToFile($content){
    //     $myfile = fopen("data/book.txt", "a") or die("Unable to open file!");
    //     fwrite($myfile, "\n". $content);
    //     fclose($myfile);
    // }

    static function add($id,$title,$price,$author,$year){
        $data = Book::getList();
        $check = true;
        foreach($data as $key => $value){
            if($value->id == $id){
                $check = false;
            }
        }
        if($check){
            $myfile = fopen("data/book.txt", "a") or die("Unable to open file!");
            $row= $id."#".$title."#".$price."#".$author."#".$year;
            fwrite($myfile, $row."\n");
            fclose($myfile);
        }
    }
    static function delete($id){
        $data = Book::getList();
        $data_res = [];
        foreach($data as $key => $value){
            if($value->id != $id){
                $data_res[] = $value;
            }
        }
        $text_write = "";
        $myfile = fopen("data/book.txt", "w") or die("Unable to open file!");
        foreach($data_res as $key => $value){
            $text_write.= $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
        }
        fwrite($myfile, $text_write);
        fclose($myfile);
    }
    static function edit($id,$title,$price,$author,$year){
        $data = Book::getList();
        $check = true;
        $text_write = "";
        $myfile = fopen("data/book.txt", "w") or die("Unable to open file!");
        foreach($data as $key => $value){
            if($value->id == $id){
                $text_write.= $id."#".$title."#".$price."#".$author."#".$year."\n";
            }else{
                $text_write .= $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
            }
        }
        fwrite($myfile, $text_write);
        fclose($myfile);
    }
    static function pagination($mount = 10,$page_index = 1,$search = null){
        if($page_index <= 1) $page_index = 1;
        $data = Book::getList($search);
        $res = [];
        $i = 0;
        for($i = $mount*($page_index-1); $i < ($mount*($page_index-1) + $mount) && $i < sizeof($data); $i++){
            $res[] = $data[$i]; 
        }
        $data_res = [
            'data' => $res,
            'size' => sizeof($data),
            'page_index' => $page_index
        ];
        return $data_res;
    }
}



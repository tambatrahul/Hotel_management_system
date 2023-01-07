<?php
include('top.php');
include('./master/modals/waiter_selection_modal.php');

$sql="select* from user;";
$res=mysqli_query($con, $sql);
if (mysqli_num_rows($res)>0) {
    while ($row=mysqli_fetch_assoc($res)) {
        ?>
<td> <a href="master/new_main.php?action=pos&id=<?php echo $row['name']?>">
<button type="button" style="height:8ch;width:10ch;margin-bottom:16px;font-size: 50px;"class="<?php if ($row['active'] > 0) { ?>btn btn-danger<?php } else { ?>btn btn-success <?php } ?>"><?php echo $row['name']?></button>
</a>
</td>
<?php
    }
}
?>
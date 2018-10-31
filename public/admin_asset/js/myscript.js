     $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
     //Hien thi 3 giay mat
     $("div.alert").delay(3000).slideUp();
     //Kiểm tra xóa
function xatNhanXoa(msg){
	if(window.confirm(msg)){
		return true;
	}
	return false;

};

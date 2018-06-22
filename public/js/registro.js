var EmployeesObj;
var Employee={
    cargar:function(functionInyec){
        $.ajax({
            url         : "/employees.json",
            type        : 'GET',
            cache       : false,
            dataType    : 'json',
            success : function(response) {
                functionInyec(response);
            },
        });
    },
};
$(document).ready(function() {
    pintar=function(employees){
        EmployeesObj = employees;
        var html="";
        $.each(employees,function(index,employee){
            html+="<tr>"+
                "<td>"+employee.name+"</td>"+
                "<td>"+employee.email+"</td>"+
                "<td>"+employee.salary+"</td>"+
                '<td><a class="btn btn-primary btn-sm" data-toggle="modal"  data-id="'+index+'" data-target="#myModal"><i class="fa fa-eye"></i> </a></td>';
            html+="</tr>";
        });
        $("#example_body").html(html);
        $("#example").dataTable();
    };
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        id = button.data('id');
        $('#name').html(EmployeesObj[id].name);
        $('#email').html(EmployeesObj[id].email);
        $('#phone').html(EmployeesObj[id].phone);
        $('#address').html(EmployeesObj[id].address);
        $('#position').html(EmployeesObj[id].position);
        $('#salary').html(EmployeesObj[id].salary);
        var html="";
        $.each(EmployeesObj[id].skills,function(index,skill){
            html += "<li>"+skill.skill+"</li>";
        });
        $('#skills').html(html);
    });
    $('#myModal').on('hide.bs.modal', function (event) {

    });
    Employee.cargar(pintar);
} );
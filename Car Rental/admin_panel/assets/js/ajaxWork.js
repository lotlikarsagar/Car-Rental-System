
function showCustomers(){
    $.ajax({
        url:"./adminView/viewCustomers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCars(){
    $.ajax({
        url:"./adminView/viewCars.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showBookings(){
    $.ajax({
        url:"./adminView/viewBookings.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showHistory(){
    $.ajax({
        url:"./adminView/viewHistory.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showPayment(){
    $.ajax({
        url:"./adminView/viewPayment.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showRecord(){
    $.ajax({
        url:"./adminView/viewRecord.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showAnalysis(){
    $.ajax({
        url:"./adminView/viewan.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



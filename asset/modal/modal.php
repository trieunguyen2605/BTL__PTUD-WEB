<!-- <style>
    .modal-overlay {
      display: none; 
      position: fixed; 
      top: 0;
      left: 0; 
      width: 100%; height: 100%; 
      background: rgba(176, 175, 175, 0.6); 
      z-index: 9999;
    }
    .modal-content {
      background: #fff; 
      width: 30%; 
      max-width: 800px;
      max-height: 85vh; 
      margin: 80px auto; 
      padding: 30px; 
      position: relative; 
      border-radius: 15px;
      overflow-y: auto; 
      box-shadow: 0 5px 15px rgba(127, 123, 123, 0.3);
    }
    .btn-close {
      position: absolute; 
      right: 30px;
      top: 15px; 
      font-size: 20px; 
      cursor: pointer;
      color: #333;
    }

    .nd__wrap{
      display:flex;
      justify-content:center;
    }

    .nd__img{
      height: 260px;
      width: 386px;
    }

    .nd__title{
      text-align: center;
      margin: 0;
    }
 
</style>

<div id="modal" class="modal-overlay">
    <div class="modal-content">
        <span class="btn-close" onclick="closeModal()">X</span>
        <div id="value"></div>
    </div>
</div> -->

<script>
    function openInfo(id) {
      window.location.href = 'index.php?page_layout=thongtin&id=' + id;
    }
</script>
<?php

$Products = $GLOBALS["products"];

?>
<script>
function confirmRemove() {
    if (confirm("By removing this Product, all productorders containing this element will be removed!") == true) {
        document.getElementById("removeForm").submit();    
    }
}
</script>
<h1>Product</h1>

<div class="row">

    
    <div class="col-md-12" class="text-right" style="width: 100%;">
        
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ProductID</th>
                <th>Type</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach($Products as $Product): ?>
          <tr>
                  <td><?php echo $Product["ProductID"]; ?></td>
                  <td><?php echo $Product["ProductType"]; ?></td>
                  <td><?php echo $Product["ProductName"]; ?></td>
                  <td><?php echo $Product["ProductDescription"]; ?></td>
                  <td><?php echo $Product["ProductPrice"]; ?></td>
                  <td>
                        <form id="removeForm" action="?page=removeProduct" method="post">
					<input type="hidden" name="givenProductID"  value="<?php echo $Product["ProductID"]; ?>" required>
			</form>
                      	<button class="btn btn-default" onclick="confirmRemove()">Remove</button>

                  </td>

          </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

    <div class="col-md-12" >
        <h2>Add a new Product</h2>
        <div class="row">
            <div class="col-sm-6" style="width: 100%;">
                <form action="?page=addProduct" method="post">
                    <div class="form-group">
                        
                        <label for="inputProductType" class="sr-only">ProductType</label>
                        <select name="givenProductType" class="form-control" id="sel1" required>
                            <option> - Select ProductType - </option>
                            <option>Food</option>
                            <option>Drink</option>
                            <option>DutyFree</option>
                        </select>
                        
                       <label for="inputProductID" class="sr-only">ProductID</label>
                        <input type="text" name="givenProductID" class="form-control" placeholder="ProductID"
                               required>
                        
                        <label for="inputProductName" class="sr-only">ProductName</label>
                        <input type="text" name="givenProductName" class="form-control" placeholder="ProductName"
                               required>
                        
                        <label for="inputProductDescription" class="sr-only">ProductDescription</label>
                        <input type="text" name="givenProductDescription" class="form-control" placeholder="ProductDescription"
                               required>
                        
                        <label for="inputProductPrice" class="sr-only">ProductPrice</label>
                        <input type="text" name="givenProductPrice" class="form-control" placeholder="ProductPrice"
                               required>
                        
                        
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>


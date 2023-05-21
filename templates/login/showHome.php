<?php require_once "templates/header.php"; ?>
<style>
   .arrow-hr {
      display: flex;
      align-items: center;
   }

   .arrow-icon {
      margin: 0 5px;
      color: #888;
   }

   .styled-hr {
      flex-grow: 1;
      border: none;
      height: 1px;
      background-color: #888;
   }
</style>
<main class="p-5 text-center container-fluid">
   <div class="row">
      <section class="col-12 mb-3 border rounded-4 border-2 shadow-lg">
         <h1>Status Voorraad</h1>
      </section>

      <div class="col-3"></div>
      <section class="col-6 mb-3 border rounded-3 border-3 shadow-lg" id="system">
         <div class="row">
            <div class="col-12">
               <h2>Status Kassaystemen</h2>
               <div class="arrow-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
                  <hr class="styled-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
               </div>
               <?php if (!empty($stockSystems)) : ?>
               <?php $stockCountSystem = count($stockSystems); ?>
               <?php if ($stockCountSystem > 0) : ?>
               <p>Er <?php echo ($stockCountSystem == 1) ? 'is' : 'zijn'; ?> momenteel <?php echo $stockCountSystem; ?>
               <?php echo ($stockCountSystem == 1) ? 'systeem' : 'systemen'; ?> op voorraad.</p>
               <?php else : ?>
               <p>Er zijn momenteel geen systemen op voorraad.</p>
               <?php endif; ?>
               <?php else : ?>
               <p>Kan geen systemen vinden in de database.</p>
               <?php endif; ?>
            </div>
            <div class="col-12">
               <form action="" method="post" class="justify-content-center mb-2"><br>
                  <button type="submit" class="btn btn-outline-primary w-100" name="system">Ga Naar voorraad</button>
               </form>
            </div>
         </div>
      </section>
      <div class="col-3"></div>

      

   </div>
</main>




<?php require_once "templates/footer.php"; ?>
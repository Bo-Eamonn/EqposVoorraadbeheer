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
   <div class="row justify-content-md-center">
      <section class="col-12 mb-3 border rounded-4 border-2 shadow-lg">
         <h1>Status Voorraad</h1>
      </section>

      
      <section class="col-6  border rounded-3 border-3 shadow-lg" id="system">
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
      
      
      
      <section class="col-6  border rounded-3 border-3 shadow-lg" id="system">
         <div class="row">
            <div class="col-12">
               <h2>Status Pinautomaten</h2>
               <div class="arrow-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
                  <hr class="styled-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
               </div>
               <?php if (!empty($stockPins)) : ?>
               <?php $stockCountPin = count($stockPins); ?>
               <?php if ($stockCountPin > 0) : ?>
               <p>Er <?php echo ($stockCountPin == 1) ? 'is' : 'zijn'; ?> momenteel <?php echo $stockCountPin; ?>
               <?php echo ($stockCountPin == 1) ? 'pinautomaat' : 'pinautomaten'; ?> op voorraad.</p>
               <?php else : ?>
               <p>Er zijn momenteel geen pinautomaten op voorraad.</p>
               <?php endif; ?>
               <?php else : ?>
               <p>Kan geen pinautomaten vinden in de database.</p>
               <?php endif; ?>
            </div>
            <div class="col-12">
               <form action="" method="post" class="justify-content-center mb-2"><br>
                  <button type="submit" class="btn btn-outline-primary w-100" name="pin">Ga Naar voorraad</button>
               </form>
            </div>
         </div>
      </section>
      

      
      <section class="col-6  border rounded-3 border-3 shadow-lg" id="system">
         <div class="row">
            <div class="col-12">
               <h2>Status Handhelds</h2>
               <div class="arrow-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
                  <hr class="styled-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
               </div>
               <?php if (!empty($stockFlips)) : ?>
               <?php $stockCountFlip = count($stockFlips); ?>
               <?php if ($stockCountFlip > 0) : ?>
               <p>Er <?php echo ($stockCountFlip == 1) ? 'is' : 'zijn'; ?> momenteel <?php echo $stockCountFlip; ?>
               <?php echo ($stockCountFlip == 1) ? 'pinautomaat' : 'pinautomaten'; ?> op voorraad.</p>
               <?php else : ?>
               <p>Er zijn momenteel geen pinautomaten op voorraad.</p>
               <?php endif; ?>
               <?php else : ?>
               <p>Kan geen pinautomaten vinden in de database.</p>
               <?php endif; ?>
            </div>
            <div class="col-12">
               <form action="" method="post" class="justify-content-center mb-2"><br>
                  <button type="submit" class="btn btn-outline-primary w-100" name="hanheld">Ga Naar voorraad</button>
               </form>
            </div>
         </div>
      </section>
      

      
      <section class="col-6  border rounded-3 border-3 shadow-lg" id="system">
         <div class="row">
            <div class="col-12">
               <h2>Status Fliptop</h2>
               <div class="arrow-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
                  <hr class="styled-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
               </div>
               <?php if (!empty($stockFlips)) : ?>
               <?php $stockCountFlip = count($stockFlips); ?>
               <?php if ($stockCountFlip > 0) : ?>
               <p>Er <?php echo ($stockCountFlip == 1) ? 'is' : 'zijn'; ?> momenteel <?php echo $stockCountFlip; ?>
               <?php echo ($stockCountFlip == 1) ? 'pinautomaat' : 'pinautomaten'; ?> op voorraad.</p>
               <?php else : ?>
               <p>Er zijn momenteel geen pinautomaten op voorraad.</p>
               <?php endif; ?>
               <?php else : ?>
               <p>Kan geen pinautomaten vinden in de database.</p>
               <?php endif; ?>
            </div>
            <div class="col-12">
               <form action="" method="post" class="justify-content-center mb-2"><br>
                  <button type="submit" class="btn btn-outline-primary w-100" name="flip">Ga Naar voorraad</button>
               </form>
            </div>
         </div>
      </section>
      

      
      <section class="col-6  border rounded-3 border-3 shadow-lg" id="system">
         <div class="row">
            <div class="col-12">
               <h2>Status Drawer</h2>
               <div class="arrow-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
                  <hr class="styled-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
               </div>
               <?php if (!empty($stockDrawers)) : ?>
               <?php $stockCountDrawer = count($stockDrawers); ?>
               <?php if ($stockCountDrawer > 0) : ?>
               <p>Er <?php echo ($stockCountDrawer == 1) ? 'is' : 'zijn'; ?> momenteel <?php echo $stockCountDrawer; ?>
               <?php echo ($stockCountDrawer == 1) ? 'pinautomaat' : 'pinautomaten'; ?> op voorraad.</p>
               <?php else : ?>
               <p>Er zijn momenteel geen pinautomaten op voorraad.</p>
               <?php endif; ?>
               <?php else : ?>
               <p>Kan geen pinautomaten vinden in de database.</p>
               <?php endif; ?>
            </div>
            <div class="col-12">
               <form action="" method="post" class="justify-content-center mb-2"><br>
                  <button type="submit" class="btn btn-outline-primary w-100" name="drawer">Ga Naar voorraad</button>
               </form>
            </div>
         </div>
      </section>
      

      
      <section class="col-6  border rounded-3 border-3 shadow-lg" id="system">
         <div class="row">
            <div class="col-12">
               <h2>Status Pcs</h2>
               <div class="arrow-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
                  <hr class="styled-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
               </div>
               <?php if (!empty($stockPcs)) : ?>
               <?php $stockCountPc = count($stockPcs); ?>
               <?php if ($stockCountPc > 0) : ?>
               <p>Er <?php echo ($stockCountPc == 1) ? 'is' : 'zijn'; ?> momenteel <?php echo $stockCountPc; ?>
               <?php echo ($stockCountPc == 1) ? 'pinautomaat' : 'pinautomaten'; ?> op voorraad.</p>
               <?php else : ?>
               <p>Er zijn momenteel geen pinautomaten op voorraad.</p>
               <?php endif; ?>
               <?php else : ?>
               <p>Kan geen pinautomaten vinden in de database.</p>
               <?php endif; ?>
            </div>
            <div class="col-12">
               <form action="" method="post" class="justify-content-center mb-2"><br>
                  <button type="submit" class="btn btn-outline-primary w-100" name="pc">Ga Naar voorraad</button>
               </form>
            </div>
         </div>
      </section>
      

      
      <section class="col-6  border rounded-3 border-3 shadow-lg" id="system">
         <div class="row">
            <div class="col-12">
               <h2>Status Printers</h2>
               <div class="arrow-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
                  <hr class="styled-hr">
                  <span class="arrow-icon">
                     <i class="bi bi-chevron-down"></i>
                  </span>
               </div>
               <?php if (!empty($stockPrinters)) : ?>
               <?php $stockCountPrinter = count($stockPrinters); ?>
               <?php if ($stockCountPrinter > 0) : ?>
               <p>Er <?php echo ($stockCountPrinter == 1) ? 'is' : 'zijn'; ?> momenteel <?php echo $stockCountPrinter; ?>
               <?php echo ($stockCountPrinter == 1) ? 'pinautomaat' : 'pinautomaten'; ?> op voorraad.</p>
               <?php else : ?>
               <p>Er zijn momenteel geen pinautomaten op voorraad.</p>
               <?php endif; ?>
               <?php else : ?>
               <p>Kan geen pinautomaten vinden in de database.</p>
               <?php endif; ?>
            </div>
            <div class="col-12">
               <form action="" method="post" class="justify-content-center mb-2"><br>
                  <button type="submit" class="btn btn-outline-primary w-100" name="printer">Ga Naar voorraad</button>
               </form>
            </div>
         </div>
      </section>
      

   </div>
</main>




<?php require_once "templates/footer.php"; ?>
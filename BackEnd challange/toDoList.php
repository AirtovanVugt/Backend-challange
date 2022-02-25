<?php include("includes/header.php"); ?>
<?php
    require("model/model.php");
    $list = allList();
    $description = allDescriptions();
?>

<body>
    <div class=container>
    <?php
        if(isset($list)){
            foreach($list as $count => $lists){
    ?>
        <div class=list>
            <p class="headText"><?php echo $lists["hoofdText"]; ?></p>
            <div class="card-container">
                <?php
                    foreach($description as $counter => $descriptions){
                        if($lists["id"] == $descriptions["hoofdTextId"]){
                ?>
                    <div class="card">
                        <p><?php echo $descriptions["omschrijving"]; ?></p>
                        <div class="deleteEdit">
                            <button class="edit" onclick="editOmschrijving(<?php echo $counter ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="delete" onclick="verwijderOmschrijving(<?php echo $descriptions['id']; ?>)"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                <?php
                        }
                    }
                ?>
                <div class="createNewcard" id="createCard<?php echo $count ?>">
                    <form method="post" action="<?php echo "controller/createDescription.php" ?>">
                        <label for="description">Beschrijving</label>
                        <textarea name="description" id="description"></textarea>
                        <input type="hidden" name="hoofdTextId" value="<?php echo $lists["id"]; ?>">
                        <div class="centerH">
                            <button>aanmaken</button>
                        </div>
                    </form>
                </div>
                <div class="createNewcardbutton" id="showCreatecard<?php echo $count ?>">
                    <i class="fa-solid fa-plus"></i>
                </div>
            </div>
        </div>
    <?php
            }
        } 
    ?>

        <div class="createList-container">
            <div class="createList">
                <p>Maak hier een lijst aan</p>
            </div>
            <div class="createNewList" id="newList">
                <form method="post" action="<?php echo "controller/createList.php" ?>">
                    <label for="titel">Titel</label>
                    <input type="text" name="titel" id="titel">
                    <div class="centerH">
                        <button>aanmaken</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>

<script>
    var array = <?php echo json_encode($list); ?>;;

    for (let i=0; i<=array.length-1; i++){
        document.getElementById("showCreatecard" + i).onclick = function(){
            document.getElementById("createCard" + i).classList.toggle("show");
        }
    }

    function verwijderOmschrijving(verwijderen){
        zekerWeten = confirm("Weet je zeker dat je dit wilt verwijderen?");
        if(zekerWeten == true){
            window.location.href = "controller/deleteDescription.php?id=" + verwijderen;
        }
    }
</script>
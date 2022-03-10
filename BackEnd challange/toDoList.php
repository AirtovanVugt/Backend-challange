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
            <div class="headList">
                <p class="headText"><?php echo $lists["hoofdText"]; ?> <?php if(isset($_SESSION["error"])){ echo $_SESSION["error"]; } ?></p>
                <div class="deleteEditlist">
                    <button class="edit" onclick="editLijst(<?php echo $lists['id']; ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete" onclick="verwijderLijst(<?php echo $lists['id']; ?>)"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
            <div class="editList" id="editList<?php echo $lists["id"]; ?>">
                <form method="post" action="<?php echo "controller/updateList.php" ?>">
                    <label for="titel">verander titel</label>
                    <input type="text" name="titel" required pattern="[a-zA-Z0-9\s]+">
                    <input type="hidden" name="id" value="<?php echo $lists["id"]; ?>">
                    <div class="centerH">
                        <button>veranderen</button>
                    </div>
                </form>
            </div>
            <div class="card-container">
                <?php
                    foreach($description as $descriptions){
                        if($lists["id"] == $descriptions["hoofdTextId"]){
                ?>
                    <div class="card">
                        <p><?php echo $descriptions["omschrijving"]; ?></p>
                        <div class="deleteEditdescription">
                            <button class="edit" onclick="editOmschrijving(<?php echo $descriptions['id']; ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="delete" onclick="verwijderOmschrijving(<?php echo $descriptions['id']; ?>)"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="editCard" id="editCard<?php echo $descriptions['id']; ?>">
                        <form method="post" action="<?php echo "controller/updateDescription.php" ?>">
                            <label for="omschrijving">verander beschrijving</label>
                            <textarea required pattern="[a-zA-Z0-9\s]+" name="omschrijving" id="editOmschrijving"><?php echo $descriptions['omschrijving']; ?></textarea>
                            <input type="hidden" name="id" value="<?php echo $descriptions["id"]; ?>">
                            <div class="centerH">
                                <button>veranderen</button>
                            </div>
                        </form>
                    </div>
                <?php
                        }
                    }
                ?>
                <div class="createNewcard" id="createCard<?php echo $count ?>">
                    <form method="post" action="<?php echo "controller/createDescription.php" ?>">
                        <label for="description">Beschrijving</label>
                        <textarea required pattern="[a-zA-Z0-9\s]+" name="description" id="description"></textarea>
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
                    <input required pattern="[a-zA-Z0-9\s]+" type="text" name="titel" id="titel">
                    <div class="centerH">
                        <button>aanmaken</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>

<script>
    var li = <?php echo json_encode($list); ?>;

    for (let i=0; i<=li.length-1; i++){
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

    function editOmschrijving(edit){
        document.getElementById("editCard" + edit).classList.toggle("show");
    }

    function verwijderLijst(verwijderen){
        zekerWeten = confirm("Weet je zeker dat je deze lijst wilt verwijderen?");
        if(zekerWeten == true){
            window.location.href = "controller/deletelist.php?id=" + verwijderen;
        }
    }

    function editLijst(showen){
        document.getElementById("editList" + showen).classList.toggle("show");
    }
</script>
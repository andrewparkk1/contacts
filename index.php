<?php include("sql/contact-controller.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/tailwind.css">
</head>

<body>

    <div class="py-14 px-12">

        <div class="flex justify-between pb-20">
            <h1 class="font-medium text-3xl">Contacts</h1>
            <button class="bg-blue-600 text-white px-5 py-3 text-md rounded-lg flex flex-row" id="createBtn">
                <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h2>Add Contact</h2>
            </button>
        </div>

        <div>

            <div id="contact-container"></div>

            <?php foreach($contacts as $contact): ?>
                <div class="flex flex-row border-gray-200 border-2 items-center py-3 px-5 my-3 w-4/6 rounded-lg justify-between cursor-pointer" id="viewModal">
                    <img src="images/<?php echo $contact['image']; ?>" alt="" class="w-14 h-14 object-cover rounded-full">
                    <p class="flex-grow pl-8 items-start"><?php echo $contact['name']; ?></p>
                    <p><?php echo $contact['date']; ?></p>
                </div>
            <?php endforeach; ?>


        </div>


        <div id="createModal" class="hidden fixed z-[1] pt-28 left-0 top-0 w-full h-full overflow-auto bg-white bg-white/30">
            <div class="bg-white m-auto p-5 border-2 border-gray-400 w-4/5">
                <div class="flex flex-col">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <div class="flex flex-row justify-between items-center text-center">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> -->
                            <h1 class="text-xl font-semibold pb-5 text-center">Create a New Contact</h1>
                            <div class="close">&times;</div>
                        </div>
                        <div class="flex flex-col pb-7 gap-1">
                            <label for="name">Contact Name</label>
                            <input type="text" name="name" class="border-gray-200 border-2 rounded h-8 w-3/5">
                        </div>
                        <div class="flex flex-col pb-7 gap-1">
                            <label for="image">Image</label>
                            <!-- <label class="border-gray-200 border-2 rounded w-fit px-10 cursor-pointer">
                                <input type="file" name="image" class="hidden"/> Add File
                            </label> -->
                            <input type="file" name="image"> 

                        </div>
                        <div class="flex flex-col pb-7 gap-1">
                            <label for="date">Last Contact Date</label>
                            <input type="date" name="date" class="border-gray-200 border-2 rounded h-8 w-3/5">
                        </div>
                        <button type="submit" name="add-contact" class="bg-blue-500 w-fit text-sm text-white py-2 px-5 rounded-lg">Save Contact</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="viewContact" class="hidden fixed z-[1] pt-28 left-0 top-0 w-full h-full overflow-auto bg-white bg-white/30">
            <div class="bg-white m-auto p-5 border-2 border-gray-400 w-4/5">
                <div class="flex flex-col">
                    <div class="flex flex-row justify-between items-center text-center">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> -->
                        <h1 class="text-xl font-semibold pb-5">View a Contact</h1>
                        <div class="close">&times;</div>
                    </div>
                    <div class="flex flex-col pb-7 gap-1">
                        <h3>Contact Name</h3>
                        <input type="text" class="border-gray-200 border-2 rounded h-8 w-3/5">
                    </div>
                    <div class="flex flex-col pb-7 gap-1">
                        <h3>Image</h3>
                        <div class="flex items-center gap-3">
                            <img src="./app/images/park, andrew.jpg" alt="" class="w-14 h-14 object-cover rounded-full">
                            <label class="border-gray-200 border-2 rounded w-fit px-10 cursor-pointer">
                                <input type="file" class="hidden"/> Add File
                            </label>
                        </div>

                    </div>
                    <div class="flex flex-col pb-7 gap-1">
                        <h3>Last Contact Date</h3>
                        <input type="text" class="border-gray-200 border-2 rounded h-8 w-3/5">
                    </div>
                    <button class="bg-blue-500 w-fit text-sm text-white py-2 px-5 rounded-lg">Update Contact</button>
                </div>
            </div>
        </div>

    </div>

    <script src="js/script.js"></script>

</body>

</html>
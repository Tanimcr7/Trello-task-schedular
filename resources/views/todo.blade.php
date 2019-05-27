<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>To Do List</title>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>

        <div class="btnToolbar">
            <a id="btnCreateNewOrder" href="#" class="btn">New Task</a>
            <!-- <a id="btnCreateNewList" href="#" class="btn">New List</a> -->
        </div>
        <div class="btnToolbar">
            <a id="btnSave" href="#" class="btn">Save</a>
            <!-- <a id="btnCreateNewList" href="#" class="btn">New List</a> -->
        </div>

        <div class="orders">
            <div class="column">
                <div class="box" data-title="To Do List">
                    <div class="header">
                        To Do List
                    </div>
                    <div class="body">
                        <ul id="sortable1" class="droptrue">
                            <!-- <li class="ui-state-highlight">PO0001 - Company Name</li>
                            <li class="ui-state-highlight">PO0001 - Company Name</li>
                            <li class="ui-state-highlight">PO0001 - Company Name</li>
                            <li class="ui-state-highlight">PO0001 - Company Name</li>
                            <li class="ui-state-highlight">PO0001 - Company Name</li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="box" data-title="In Work">
                    <div class="header">
                        In Work
                    </div>
                    <div class="body">
                        <ul id="sortable2" class="dropfalse">
                            <!-- <li class="ui-state-highlight">PO0001 - Company Name</li>
                            <li class="ui-state-highlight">PO0001 - Company Name</li>
                            <li class="ui-state-highlight">PO0001 - Company Name</li> -->
                        </ul>
                    </div>
                </div>

                <!-- <div class="box" data-title="Waiting for material">
                    <div class="header">
                        Done
                    </div>
                    <div class="body">
                        <ul id="sortable2" class="dropfalse">
                            <li class="ui-state-highlight">PO0001 - Company Name</li>
                            <li class="ui-state-highlight">PO0001 - Company Name</li>
                            <li class="ui-state-highlight">PO0001 - Company Name</li>
                        </ul>
                    </div>
                </div> -->
            </div>

            <div class="column">
                <div class="box" data-title="Done">
                    <div class="header">
                        Done
                    </div>
                    <div class="body">
                        <ul id="sortable3" class="droptrue">
                            <!-- <li class="ui-state-highlight">PO0001 - Company Name</li>
                            <li class="ui-state-highlight">PO0001 - Company Name</li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <!--            <div class="column">
            
                        </div>-->
        </div>

        <br style="clear:both">

        <div id="dialog-form" title="Create new task">
            <form >
                <fieldset >
                    <label for="po">Name</label>
                    <input type="text" name="po" id="po" value="" class="text ui-widget-content ui-corner-all">
                    <label for="company">Description</label>
                    <input type="text" name="company" id="company" value="" class="text ui-widget-content ui-corner-all">

                    <label for="list">List</label>
                    <select id="list" name="list">
                        <option value="To Do List">To Do List</option>
                        <option value="In Work">In Work</option>
                        <option value="Done">Done</option>
                    </select>

                    <!-- Allow form submission with keyboard without duplicating the dialog button -->
                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
            </form>
        </div>

        <!-- <div id="dialog-form-list" title="Create new list">
            <form id="formList">
                <fieldset>
                    <label for="listname">List Name</label>
                    <input type="text" name="listname" id="listname" value="Untitled" class="text ui-widget-content ui-corner-all">
 Allow form submission with keyboard without duplicating the dialog button 
                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
            </form>
        </div> -->

        <script>

        
        function post_to_url(path, params, method) {
        method = method || "post";

        var form = document.createElement("form");

        //Move the submit function to another variable
        //so that it doesn't get overwritten.
        form._submit_function_ = form.submit;

        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for(var key in params) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }

        document.body.appendChild(form);
        form._submit_function_(); //Call the renamed function.
    }
    
        function post(path, params, method='post') {

            // The rest of this code assumes you are not using a library.
            // It can be made less wordy if you use one.
            const form = document.createElement('form');
            form.method = method;
            form.action = path;

            for (const key in params) {
            if (params.hasOwnProperty(key)) {
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = key;
                hiddenField.value = params[key];

                form.appendChild(hiddenField);
            }
            }

            document.body.appendChild(form);
            form.submit();
            }

            
            $(function () {
                function initSortable() {
                    $(".column").sortable({
                        connectWith: ".column",
                        handle: ".header",
//                    cancel: ".header"
//                    placeholder: "portlet-placeholder ui-corner-all"
                    });
                    $("ul.droptrue").sortable({
                        connectWith: "ul"
                    });
                    $("ul.dropfalse").sortable({
                        connectWith: "ul",
//                    dropOnEmpty: false
                    });
                    $("#sortable1, #sortable2, #sortable3").disableSelection();
                }
                initSortable();
                $(".btn")
                        .button()
                        .click(function (event) {
                            event.preventDefault();
                        });
                function addOrder() {
                    var valid = true;
//                    allFields.removeClass("ui-state-error");
//                    valid = valid && checkLength(name, "username", 3, 16);
//                    valid = valid && checkLength(email, "email", 6, 80);
//                    valid = valid && checkLength(password, "password", 5, 16);
//
//                    valid = valid && checkRegexp(name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter.");
//                    valid = valid && checkRegexp(email, emailRegex, "eg. ui@jquery.com");
//                    valid = valid && checkRegexp(password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9");
                    if (valid) {
                        selectedList = $('#list').find(":selected").text();
                        box = $('div').find("[data-title='" + selectedList + "']");
                        boxList = box.find('ul');
                        var po = $('#po').val();
                        var company = $('#company').val();
                        
                        if(selectedList == 'To Do List')
                        {
                            
                            $.ajax({
                            url: '/todosave',
                            type: 'POST',
                            cache: false,
                            data: {
                             "_token": "{{ csrf_token() }}",
                             po: po,
                             company:company
                            },
                            success: function(data){
                              console.log(data);
                            }
                            });
                        }
                        else if(selectedList == 'In Work')
                        {
                            $.ajax({
                            url: '/inworksave',
                            type: 'POST',
                            cache: false,
                            data: {
                             "_token": "{{ csrf_token() }}",
                             po: po,
                             company:company
                            },
                            success: function(data){
                              console.log(data);
                            }
                            });
                        }
                        else if(selectedList == 'Done')
                        {
                            $.ajax({
                            url: '/donesave',
                            type: 'POST',
                            cache: false,
                            data: {
                             "_token": "{{ csrf_token() }}",
                             po: po,
                             company:company
                            },
                            success: function(data){
                              console.log(data);
                            }
                            });
                        }
                        // window.location.href=url;
                        

                       
                        boxList.append("<li class=\"ui-state-highlight\">" + po + " - " + company + "</li>");
//                        $("#users tbody").append("<tr>" +
//                                "<td>" + name.val() + "</td>" +
//                                "<td>" + email.val() + "</td>" +
//                                "<td>" + password.val() + "</td>" +
//                                "</tr>");
                       
                        dialog.dialog("close");
                    }
                    return valid;
                }
                dialog = $("#dialog-form").dialog({
                    autoOpen: false,
                    height: 380,
                    width: 350,
                    modal: true,
                    buttons: {
                        "Create new task": addOrder,
                        Cancel: function () {
                            dialog.dialog("close");
                        }
                    },
                    close: function () {
//                        $("#dialog-form")[0].reset();
//                        allFields.removeClass("ui-state-error");
                    }
                });
                // function addList() {
                //     bodyWidth = $("body").width();
                //     nextWidth = bodyWidth + 300;
                //     $('body').css('width', nextWidth + 'px');
                //     var listName = $('#listname').val();
                //     $("div.orders").append("<div class=\"column\">" +
                //             "<div class=\"box\" data-title=\"" + listName + "\">" +
                //             "<div class=\"header\">" +
                //             "    " + listName +
                //             "</div>" +
                //             "<div class=\"body\">" +
                //             "    <ul id=\"sortable3\" class=\"droptrue\">" +
                //             "    </ul>" +
                //             "</div>" +
                //             "</div></div>");
                //     initSortable();
                //     dialogList.dialog("close");
                // }
//                 dialogList = $("#dialog-form-list").dialog({
//                     autoOpen: false,
//                     height: 250,
//                     width: 350,
//                     modal: true,
//                     buttons: {
//                         "Create new list": addList,
//                         Cancel: function () {
//                             dialogList.dialog("close");
//                         }
//                     },
//                     close: function () {
// //                        $("#dialog-form-list")[0].reset();
// //                        allFields.removeClass("ui-state-error");
//                     }
//                 });
                form = dialog.find("form").on("submit", function (event) {
                    event.preventDefault();
                    addOrder();
                });
                form = dialog.find("#formList").on("submit", function (event) {
                    event.preventDefault();
                    addList();
                });
                $("#btnCreateNewOrder").button().on("click", function () {
                    dialog.dialog("open");
                });
                $("#btnCreateNewList").button().on("click", function () {
                    dialogList.dialog("open");
                });
            });

            $("#btnSave").button().on("click", function () {
                    console.log("Orelly");

                    // $( "li" ).each(function( index ) {
                    // console.log( index + ": " + $( this ).text() );
                    // });
                    // $('#sortable1').each(function(){// id of ul
                    // var li = $(this).find('li')//get each li in ul

                    // console.log(li.text)//get text of each li


                    // });

                    let todo = [];
                    let inwork = [];
                    let done = [];
                   

                    jQuery('#sortable1 li').each(function(){
                        //console.log($(this).text()); //prints each li text value in console
                        todo.push($(this).text());
                    });  
                    jQuery('#sortable2 li').each(function(){
                        //console.log($(this).text()); //prints each li text value in console
                        inwork.push($(this).text());
                    });    
                    jQuery('#sortable3 li').each(function(){
                        //console.log($(this).text()); //prints each li text value in console
                        done.push($(this).text());
                    });       

                    console.log(todo);
                    console.log(inwork);
                    console.log(done);

                  
                            $.ajax({
                                
                            url: '/todosave/update',
                            type: 'POST',
                            cache: false,
                            data: {
                             "_token": "{{ csrf_token() }}",
                             todo: todo,
                             inwork: inwork,
                             done: done
                            },
                            success: function(data){
                              console.log(data);
                            }
                            });
                    
                });
            $( document ).ready(function() {
                console.log( "tada!" );

                $.ajax({
                            url: '/todotask',
                            type: 'GET',
                            cache: false,
                            // data: {
                            //  "_token": "{{ csrf_token() }}",
                            //  po: po,
                            //  company:company
                            // },
                            success: function(data){
                              console.log(data);
                              console.log(data.todo.length);
                              for(var i=0;i<data.todo.length;i++)
                                {
                                    var valid = true;
                                    if (valid) {
                                    selectedList = "To Do List";
                                    box = $('div').find("[data-title='" + selectedList + "']");
                                    boxList = box.find('ul');
                                    var po = data.todo[i].name;
                                    var company = data.todo[i].description;
                                    
                                    boxList.append("<li class=\"ui-state-highlight\">" + po + " - " + company + "</li>");
                                    }
                                    //return valid;
                                
                                }
                                for(var i=0;i<data.inwork.length;i++)
                                {
                                   
                                    var valid = true;
                                    if (valid) {
                                    selectedList = "In Work";
                                    box = $('div').find("[data-title='" + selectedList + "']");
                                    boxList = box.find('ul');
                                    var po = data.inwork[i].name;
                                    var company = data.inwork[i].description;
                                    
                                    boxList.append("<li class=\"ui-state-highlight\">" + po + " - " + company + "</li>");
                                    }
                                    //return valid;
                            
                                
                                }
                                for(var i=0;i<data.done.length;i++)
                                {
                                   
                                    var valid = true;
                                    if (valid) {
                                    selectedList = "Done";
                                    box = $('div').find("[data-title='" + selectedList + "']");
                                    boxList = box.find('ul');
                                    var po = data.done[i].name;
                                    var company = data.done[i].description;
                                    
                                    boxList.append("<li class=\"ui-state-highlight\">" + po + " - " + company + "</li>");
                                    }
                                    //return valid;
                            
                                
                                }
                                
                           
                        
                            }
                            });
            });
        </script>
    </body>
</html>
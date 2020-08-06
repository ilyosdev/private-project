// 👇👇👇========================Helpers========================
const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);

Node.prototype.nthParent = function(n){
    let node = this;
    for(let i = 0; i < n; i++){
        node = node.parentElement;
    }
    return node;
}

Node.prototype.on = Node.prototype.addEventListener;
Node.prototype.no = Node.prototype.removeEventListener;

Node.prototype.show = function(){
    this.style.display = 'block';
}

Node.prototype.flex = function(){
    this.style.display = 'flex';
}

Node.prototype.hide = function(){
    this.style.display = 'none';
}

const DIV = (classNames = null) => {
    let div = document.createElement('div');

    classNames && classNames.split(' ').forEach(c => {
        c.trim() && div.classList.add(c.trim());
    });

    return function(inner_html = null){
        inner_html && (div.innerHTML = inner_html)
        return div;
    };
}
const BUTTON = (classNames = null) => {
    let btn = document.createElement('button');

    classNames && classNames.split(' ').forEach(c => {
        c.trim() && btn.classList.add(c.trim());
    });

    return function(inner_html = null){
        inner_html && (btn.innerHTML = inner_html)
        return btn;
    };
}
// 👆👆👆========================Helpers========================


const loading = $('.overlay-loading');
const alertBox = $('.alert-box');
const confirmBox = $('.confirm-box');
const promptBox = $('.prompt-box');

const AlertCancel = ()=>{
    alertBox.hide();
}

// ========== DECORATORS =============
const alert = (str='')=>{
    $('.alert-message').innerHTML = str.trim();
    alertBox.flex();
}

const confirm = (str='', cb)=>{
    $('.confirm-message').innerHTML = str.trim();
    confirmBox.flex();

    let btnYes = confirmBox.children[1].children[0];
    let btnNo = confirmBox.children[1].children[1];

    btnYes.on('click', ()=>{
        confirmBox.hide();
        cb(true);
    })

    btnNo.on('click', ()=>{
        confirmBox.hide();
        cb(false);
    })
}

const prompt = (str='', cb)=>{
    let label = $('.prompt-message').children[0];
    let input = $('.prompt-message').children[2];

    label.innerHTML = str.trim();
    promptBox.flex();

    let btnYes = $('.prompt-actions').children[1];
    let btnNo = $('.prompt-actions').children[0];

    let yes_listener = ()=>{
        promptBox.hide();
        cb(input.value.trim());
        input.value = '';
        btnYes.no('click', yes_listener);
        btnNo.no('click', no_listener);
    }

    let no_listener = ()=>{
        promptBox.hide();
        input.value = '';
        btnYes.no('click', yes_listener);
        btnNo.no('click', no_listener);
    }

    btnYes.on('click', yes_listener)
    btnNo.on('click', no_listener)
}
// ========== DECORATORS =============



const NewLessonItem = (lesson='', id=0)=>{
    let lessonItem = DIV("lesson-item")();
    lessonItem.setAttribute("data-id", id);

    let lessonTitle = DIV("lesson-title")(lesson);
    let lessonBody = DIV("lesson-body")();
    let lessonActions = DIV("lesson-actions")();
    let btnEditLesson = BUTTON()("Edit lesson");
    let btnDeleteLesson = BUTTON()("Delete lesson");
    let btnManageLesson = BUTTON()("Manage lesson");
    let lessonBodyContents = DIV("lesson-body-contents")();


    lessonActions.appendChild(btnEditLesson);
    lessonActions.appendChild(btnDeleteLesson);

    lessonBody.appendChild(lessonActions);
    lessonBody.appendChild(btnManageLesson);
    lessonBody.appendChild(lessonBodyContents);

    lessonItem.appendChild(lessonTitle);
    lessonItem.appendChild(lessonBody);


    lessonTitle.on('click', LessonDetailsToggleListener);
    btnEditLesson.on('click', EditLessonListener);
    btnDeleteLesson.on('click', DeleteLessonListener);
    btnManageLesson.on('click', ManageLessonListener);

    return lessonItem;
}

// 👇👇👇DOM card generator
const NewChapterCard = (chapter='', id=0)=>{

    let gridCol = DIV("grid-col")();
    gridCol.setAttribute("data-id", id);

    let chapterTitle = DIV("chapter-title")(chapter);

    let chapterCard = DIV("chapter-card")();

    let chapterControls = DIV('chapter-controls')();

    let btnEditChapter = BUTTON('btn-edit-chapter')('Edit chapter');
    let btnDeleteChapter = BUTTON('btn-delete-chapter')('Delete chapter');
    let btnAddLesson = BUTTON('btn-add-lesson')('+ Add lesson');

    let chapterContents = DIV('chapter-contents')();

    gridCol.appendChild(chapterTitle);

    chapterControls.appendChild(btnEditChapter);
    chapterControls.appendChild(btnDeleteChapter);
    chapterCard.appendChild(chapterControls);
    chapterCard.appendChild(chapterContents);
    chapterCard.appendChild(btnAddLesson);

    gridCol.appendChild(chapterCard);



    btnEditChapter.on('click', EditChapterListener);
    btnDeleteChapter.on('click', DeleteChapterListener);
    btnAddLesson.on('click', AddLessonListener);

    return gridCol;
}


// 👇👇👇Add chapter button listener
$('.btn-add-chapter').on('click', (event)=>{
    let flexGridThirds = event.target.nthParent(3);
    let gridCol = event.target.nthParent(2);

    prompt('Chapter title:', (value)=>{
        if(value){
            CREATE_CHAPTER(value, ({err, id, title})=>{
                if(err){
                    alert('Error creating the chapter!');
                }else{
                    flexGridThirds.insertBefore(NewChapterCard(title, id), gridCol);
                }
            })
        }else{
            alert("Error: Chapter title cannot be empty!");
        }
    })
})

// 👇👇👇============Card Actions==============
const EditChapterListener = (event)=>{
    let mainParentGridCol = event.target.nthParent(3);
    let ID = mainParentGridCol.getAttribute("data-id");

    if(ID){
        prompt('Set a new title:', (title)=>{
            if(title){
                EDIT_CHAPTER(ID, title, ({err, title})=>{
                    if(!err){
                        mainParentGridCol.children[0].innerHTML = title;
                    }else{
                        alert('Error updating the chapter!');
                    }
                })
            }else{
                alert("Error: Chapter title cannot be empty!");
            }
        })
    }
}

const DeleteChapterListener = (event)=>{
    let parentNode = event.target.nthParent(4);
    let mainParentGridCol = event.target.nthParent(3);

    let ID = mainParentGridCol.getAttribute("data-id");

    if(ID){
        confirm("Do you really want to delete this chapter with everything inside it?", (done)=>{
            if(done){
                DELETE_CHAPTER(ID, (err)=>{
                    if(!err){
                        (parentNode && mainParentGridCol && parentNode.contains(mainParentGridCol)) && parentNode.removeChild(mainParentGridCol);
                    }else{
                        alert('Error deleting the chapter!');
                    }
                })
            }
        })

    }
}
// 👆👆👆============Card Actions==============



// =================Lesson actions==============
const AddLessonListener = (event)=>{
    let chapterId = event.target.nthParent(2).getAttribute("data-id");
    let chapterContents = event.target.nthParent(1).children[1];

    prompt('Lesson title:', (lessonTitle)=>{
        if(!lessonTitle){
            alert("Error: Lesson title cannot be empty!");
        }else{
            CREATE_LESSON(lessonTitle, ({err, id, title})=>{
                if(err){
                    alert('Error creating the lesson!');
                }else{
                    chapterContents.appendChild(NewLessonItem(title, id));
                }
            })
        }
    })
}

const LessonDetailsToggleListener = event =>{
    let parentLessonItem = event.target.nthParent(1);
    let parentChapterContents = event.target.nthParent(2);

    let ID = parentLessonItem.getAttribute("data-id");

    for(let lessonItem of parentChapterContents.children){
        if(lessonItem.getAttribute("data-id") === ID){
            // expand or collapse item body
            if(lessonItem.children[1].style.display === 'block'){
                lessonItem.children[1].hide();
            }else{
                lessonItem.children[1].show();
            }
        }else{
            // collapse item body
            lessonItem.children[1].hide()
        }
    }
}

const EditLessonListener = event =>{
    let parentLessonItem = event.target.nthParent(3);
    let ID = parentLessonItem.getAttribute("data-id");

    if(ID){
        prompt('Set a new title:', (title)=>{
            if(title){
                EDIT_LESSON(ID, title, ({err, title})=>{
                    if(!err){
                        parentLessonItem.children[0].innerHTML = title;
                    }else{
                        alert('Error updating the lesson!');
                    }
                })
            }else{
                alert("Error: Lesson title cannot be empty!");
            }
        })
    }
}

const DeleteLessonListener = event =>{
    let parentLessonItem = event.target.nthParent(3);
    let ID = parentLessonItem.getAttribute("data-id");

    if(ID){
        confirm("Do you really want to delete this lesson with everything inside it?", (done)=>{
            if(done){
                DELETE_LESSON(ID, (err)=>{
                    if(!err){
                        parentLessonItem.nthParent(1) && parentLessonItem.nthParent(1).removeChild(parentLessonItem);
                    }else{
                        alert('Error deleting the lesson!');
                    }
                })
            }
        })
    }
}

const ManageLessonListener = event =>{
    let parentLessonItem = event.target.nthParent(2);
    let ChapterID = parentLessonItem.nthParent(3).getAttribute("data-id");
    let LessonID = parentLessonItem.getAttribute("data-id");

    console.log(`/Chapter/${ChapterID}/Lesson/${LessonID}`)

    // redirect to some sort of page to manage lesson contents
    // window.location = `/Chapter/${ChapterID}/Lesson/${LessonID}`

}
// =================Lesson actions==============
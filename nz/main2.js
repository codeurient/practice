var tabCharacter = "  ";
var tabOffset = 2;

document.addEventListener('click', function(e) {
    if (e.target.id === 'indent') {
        e.preventDefault();
        var self = e.target;

        self.classList.toggle('active');

        if (self.classList.contains('active')) {
            tabCharacter = "\t";
            tabOffset = 1;
        } else {
            tabCharacter = "  ";
            tabOffset = 2;
        }
    }

    if (e.target.id === 'fullscreen') {
        e.preventDefault();
        var self = e.target;

        self.classList.toggle('active');
        var editorHolder = self.closest('.editor-holder');
        if (editorHolder) {
            editorHolder.classList.toggle('fullscreen');
        }
    }
});

/*------------------------------------------
    Render existing code
------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    hightlightSyntax();

    emmet.require('textarea').setup({
        pretty_break: true,
        use_tab: true
    });
});

/*------------------------------------------
    Capture text updates
------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    var editors = document.querySelectorAll('.editor');
    editors.forEach(function(editor) {
        editor.addEventListener('keyup', handleEditorChange);
        editor.addEventListener('keydown', handleEditorChange);
        editor.addEventListener('change', handleEditorChange);
        correctTextareaHeight(editor);
    });
});

function handleEditorChange(event) {
    correctTextareaHeight(event.target);
    hightlightSyntax();
}

/*------------------------------------------
    Resize textarea based on content
------------------------------------------*/
function correctTextareaHeight(element) {
    var self = element,
        outerHeight = self.offsetHeight,
        innerHeight = self.scrollHeight,
        borderTop = parseFloat(getComputedStyle(self).borderTopWidth),
        borderBottom = parseFloat(getComputedStyle(self).borderBottomWidth),
        combinedScrollHeight = innerHeight + borderTop + borderBottom;

    if (outerHeight < combinedScrollHeight) {
        self.style.height = combinedScrollHeight + 'px';
    }
}

/*------------------------------------------
    Run syntax highlighter
------------------------------------------*/
function hightlightSyntax() {
    var editor = document.querySelector('.editor');
    var content = editor.value;
    var codeHolder = document.querySelector('code');
    var escaped = escapeHtml(content);

    codeHolder.innerHTML = escaped;

    document.querySelectorAll('.syntax-highight').forEach(function(block) {
        hljs.highlightBlock(block);
    });
}

/*------------------------------------------
    String html characters
------------------------------------------*/
function escapeHtml(unsafe) {
    return unsafe
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

/*------------------------------------------
    Enable tabs in textarea
------------------------------------------*/
document.addEventListener('keydown', function(e) {
    var keyCode = e.keyCode || e.which;

    if (keyCode == 9) {
        e.preventDefault();
        var textarea = e.target;

        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;

        // set textarea value to: text before caret + tab + text after caret
        textarea.value = textarea.value.substring(0, start) +
            tabCharacter + textarea.value.substring(end);

        // put caret at the right position again
        textarea.selectionStart = textarea.selectionEnd = start + tabOffset;
    }
}, true);




// // Получаем элемент <textarea> по его ID
// var textarea = document.getElementById("myTextarea");
// // Предотвращаем действие "Ctrl+A" и "Command+A"
// textarea.addEventListener("keydown", function (e) {
//     if ((e.ctrlKey || e.metaKey) && e.key === "a" || e.key === "c" || e.key === "v") {
//         e.preventDefault();
//     }
//     // Предотвращаем действие "Shift" в сочетании с клавишами управления текстовым курсором
//     if (e.shiftKey && (e.key === "ArrowLeft" || e.key === "ArrowRight" || e.key === "ArrowUp" || e.key === "ArrowDown")) {
//         e.preventDefault();
//     }
// });


// Флаг, который показывает, активировано ли предотвращение выделения текста
var preventSelection = false;

// Время последнего клика
var lastClickTime = 0;

// Предотвращаем выделение текста при движении курсора
document.addEventListener("mousemove", function (e) {
    if (preventSelection) {
        e.preventDefault();
    }
});

// // При клике на странице включаем предотвращение выделения текста
// document.addEventListener("mousedown", function (e) {
//     preventSelection = true;
//
//     // Проверяем, был ли клик с нажатой клавишей Shift
//     if (e.shiftKey) {
//         e.preventDefault();
//     } else {
//         // Проверяем, прошло ли достаточно времени с предыдущего клика
//         var currentTime = new Date().getTime();
//         if (currentTime - lastClickTime < 450) {
//             e.preventDefault();
//         }
//
//         // Обновляем время последнего клика
//         lastClickTime = currentTime;
//     }
// });
//
// // При отпускании кнопки мыши отключаем предотвращение выделения текста
// document.addEventListener("mouseup", function (e) {
//     preventSelection = false;
// });
//
// // Предотвращаем контекстное (всплывающее) меню
// document.addEventListener("contextmenu", function (e) {
//     e.preventDefault();
// });
//
//
// let currentURL = 'https://example.com/alternate-page';
// if(window.location.href === currentURL){
//     // redirect page
//     window.addEventListener( "pageshow", function ( event ) {
//         let historyTraversal = event.persisted || ( typeof window.performance != "undefined" &&  window.performance.navigation.type === 2 );
//         if ( historyTraversal ) {
//             window.location.href = 'https://example.com/alternate-page';
//         }
//     });
// }






// Sidebar Menu
const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
      dropMenu = body.querySelector(".block-a");
      subMenu = body.querySelector(".sub-menu");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close");
});
dropMenu.addEventListener("click", (e) => {
    e.preventDefault();
    subMenu.classList.toggle("active");
});


modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    if(body.classList.contains("dark")) {
        modeText.innerText = "Light Mode";
    } else {
        modeText.innerText = "Dark Mode";
    }
});


































































































































































// window.addEventListener('DOMContentLoaded', () => {
//     let devToolsOpened = false;
//     let wasDevToolsOpened = false;
//     // Function to redirect the user to another page
//     function redirectToAlternatePage() {
//         window.location.href = 'https://example.com/alternate-page';
//     }
//     // Check for DevTools periodically.
//     setInterval(() => {
//         if (isDevToolsOpened()) {
//             devToolsOpened = true;
//             // Redirect to another page when DevTools are opened.
//             redirectToAlternatePage();
//         } else if (devToolsOpened && !wasDevToolsOpened) {
//             // If DevTools were opened at some point but not anymore, set a flag.
//             wasDevToolsOpened = true;
//         }
//     }, 3000);
//     function isDevToolsOpened($a) {
//         console.log($a)
//         const widthThreshold = window.outerWidth - window.innerWidth > 160;
//         const heightThreshold = window.outerHeight - window.innerHeight > 160;
//         return widthThreshold || heightThreshold;
//     }
//     // Listen for the popstate event to detect when the user navigates using the "Back" button.
//     window.addEventListener('popstate', () => {
//         if (wasDevToolsOpened) {
//             // Reset the flag when the user navigates back and DevTools were opened at some point.
//             devToolsOpened = false;
//         }
//     });
// });








const wrapper = document.querySelector(".wrapper");
const carosel = document.querySelector(".carosel");
const firstCardWidth = carosel.querySelector(".card").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrapper i");
const caroselChildrens = [...carosel.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

// Get the number of cards that can fit in the carousel at once
let cardPerView = Math.round(carosel.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
caroselChildrens.slice(-cardPerView).reverse().forEach(card => {
    carosel.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
caroselChildrens.slice(0, cardPerView).forEach(card => {
    carosel.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carosel.classList.add("no-transition");
carosel.scrollLeft = carosel.offsetWidth;
carosel.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carosel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart = (e) => {
    isDragging = true;
    carosel.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startX = e.pageX;
    startScrollLeft = carosel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carosel.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carosel.classList.remove("dragging");
}

const infiniteScroll = () => {
    // If the carousel is at the beginning, scroll to the end
    if(carosel.scrollLeft === 0) {
        carosel.classList.add("no-transition");
        carosel.scrollLeft = carosel.scrollWidth - (2 * carosel.offsetWidth);
        carosel.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carosel.scrollLeft) === carosel.scrollWidth - carosel.offsetWidth) {
        carosel.classList.add("no-transition");
        carosel.scrollLeft = carosel.offsetWidth;
        carosel.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutId);
    if(!wrapper.matches(":hover")) autoPlay();
}

const autoPlay = () => {
    if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutId = setTimeout(() => carosel.scrollLeft += firstCardWidth, 2500);
}
autoPlay();

carosel.addEventListener("mousedown", dragStart);
carosel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carosel.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);
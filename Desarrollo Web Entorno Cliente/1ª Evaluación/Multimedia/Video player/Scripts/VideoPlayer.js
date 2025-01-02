let picturesPath = "./Media/Pictures/";
let adPlayed;
let adLength;
let adInterval;
let controlsFrozen;
let progressInterval;

document.addEventListener("DOMContentLoaded", () => {
    video.addEventListener("loadedmetadata", () => {
        progress.max = video.duration;
        timestamp.innerText = `${FormatSeconds(video.currentTime)} / ${FormatSeconds(video.duration)}`;
        console.log(video.duration);
    });
});

function Main() {
    closeAdButton.addEventListener("click", CloseAd);
    play.addEventListener("click", PlayVideo);
    restart.addEventListener("click", RestartVideo);
    mute.addEventListener("click", Mute);
    lower.addEventListener("click", ChangeVolume);
    higher.addEventListener("click", ChangeVolume);
    forwards.addEventListener("click", Skip);
    backwards.addEventListener("click", Skip);
    fullscreen.addEventListener("click", () => video.requestFullscreen());
    video.addEventListener("ended", () => {
        playButtonIcon.src = "./Media/Pictures/play.png";
        progress.value = video.duration;
        clearInterval(progressInterval);
    });
    document.addEventListener("click", (event) => {
        if (event.target instanceof HTMLVideoElement && event.target.src != video.src) {
            console.log(event.target);
            video.src = event.target.src;
            // PlayAd(); // Comment this line to get rid of the popup
            if (!adPlayed) video.poster = event.target.poster;
            PlayVideo();
        }
    });
}

function PlayAd() {
    clearInterval(adInterval);
    adPlayed = false;
    adLength = 10;
    countdown.innerText = `${adLength} segundos`;
    controlsFrozen = true;
    ad.classList.remove("hidden");
    adInterval = setInterval(() => {
        adLength--;
        countdown.innerText = `${adLength} segundos`;
        if (adLength == 0) {
            clearInterval(adInterval);
            adPlayed = true;
        }
    }, 1000);
}

function CloseAd() {
    if (!adPlayed) return;
    ad.classList.add("hidden");
    controlsFrozen = false;
    PlayVideo();
}

function PlayVideo() {
    if (controlsFrozen) return;
    if (!video.paused) {
        video.pause();
        clearInterval(progressInterval);
        playButtonIcon.src = "./Media/Pictures/play.png";
        return;
    }
    // Comment these lines to get rid of the popup
    // if (!adPlayed) {
    //     PlayAd();
    //     return;
    // }
    video.play();
    progressInterval = setInterval(() => {
        progress.value = video.currentTime
        timestamp.innerText = `${FormatSeconds(video.currentTime)} / ${FormatSeconds(video.duration)}`;
    });
    playButtonIcon.src = "./Media/Pictures/pause.png";
}

function Mute() {
    if (controlsFrozen) return;
    video.muted = !video.muted;
    video.muted ? muteButtonIcon.src = "./Media/Pictures/mute.png" : muteButtonIcon.src = "./Media/Pictures/volume.png";
}

function ChangeVolume(event) {
    if (controlsFrozen) return;
    try {
        console.log(event.currentTarget.id);
        event.currentTarget.id == "lower" ? video.volume -= 0.1 : video.volume += 0.1;
        console.log("Volume: " + video.volume);
    } catch (err) {
        console.warn("Tried to set the volume to a value that isn't allowed");
    }
}

function Skip(event) {
    if (controlsFrozen) return;
    event.currentTarget.id == "backwards" ? video.currentTime -= 10 : video.currentTime += 10;
    progress.value = video.currentTime;
    timestamp.innerText = `${FormatSeconds(video.currentTime)} / ${FormatSeconds(video.duration)}`;
}

function RestartVideo() {
    if (controlsFrozen) return;
    video.currentTime = 0;
    progress.value = video.currentTime;
    // Comment these lines to get rid of the popup
    // video.pause();
    // PlayAd();
}

function FormatSeconds(seconds) {
    let minutes = Math.floor(seconds / 60);
    let remainingSeconds = Math.floor(seconds % 60);

    return `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
}
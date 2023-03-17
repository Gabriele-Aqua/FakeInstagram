import axios from "axios";

document.addEventListener("DOMContentLoaded", () => {
    const followBtn = document.querySelector("#followBtn");
    if (!followBtn) return;

    followBtn.addEventListener("click", (e) => {
        axiosCallforFollowing();
    });

    function toggleValue(isFollowing: boolean) {
        if (!followBtn) return;

        if (isFollowing) {
            followBtn.innerHTML = "UnFollow";
            followBtn.setAttribute("data-isFollowing", "false");
        } else {
            followBtn.innerHTML = "Follow";
            followBtn.setAttribute("data-isFollowing", "true");
        }
    }

    function axiosCallforFollowing() {
        if (!followBtn) return;

        const currentUserId = followBtn.getAttribute("data-userId");

        // Send a POST request
        axios
            .post(`/follow/${currentUserId}`)
            .then((response) => {
                toggleValue(response.data.attached > 1);
            })
            .catch((errors) => {
                if (errors.response.status == 401) {
                    window.location.href = "/login";
                }
            });
    }
});

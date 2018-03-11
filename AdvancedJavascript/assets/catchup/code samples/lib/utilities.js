var Utilties = {
            removeElement: function (ev) {
                ev.preventDefault();
                var data = ev.dataTransfer.getData("id");
                var toBin = document.getElementById(data);
                ev.target.appendChild(document.getElementById(data));
                ev.target.removeChild(document.getElementById(data));
                setTimeout(function () {
                    ev.target.innerHTML = '';
                }, 2000);
                ev.target.innerHTML = '<p>Item removed</p>';

            }
        }
<script>
    function whosFocused(){
        var curElement = document.activeElement;
        //localStorage.setItem('curFocus',curElement);
        console.log("currently selected:"+curElement);
        //console.log(curElement.nextSibling.nextSibling.className);
        var nextDude = curElement.nextSibling.nextSibling;
        if(nextDude.className == "modx-subnav"){
            //console.log("bazinga");
            //clear any open subnavs
            clearSubNavOpen();

            //force open subnav	
            nextDude.className = "modx-subnav open";
        }
    }

    function clearSubNavOpen(){
        var findSubOpen = document.getElementsByClassName("modx-subnav open");
        var runClearOpen = Array.prototype.filter.call(findSubOpen, function(clearThisUl){
            clearThisUl.className = "modx-subnav";
        });
    }

    document.getElementById("navbar").addEventListener("keydown", whosFocused, false);
    //just incase your moving your mouse too. its good for everyone
    document.getElementById("navbar").addEventListener("mouseleave", clearSubNavOpen, false);
    document.getElementById("nextItem").addEventListener("focus", clearSubNavOpen, false);
</script>
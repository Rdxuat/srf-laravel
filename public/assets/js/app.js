 gsap.registerPlugin(ScrollTrigger,ScrollSmoother);
  const smoother = ScrollSmoother.create({
   content: "#wrapper",
   smooth: 2,
   effects: true
 });

smoother.effects(".divanimation", { speed: "1", lag: .8 });
 var win = $(this);
 if(win.width()>1000){

   const t21 = gsap.timeline({ 
    scrollTrigger: {
      trigger: '.hminventingsec',
      scrub:1,
      // markers:true,
      toggleActions: 'restart none none none',
      pin:true,
      start: '0%',
      end:'100%'
    }
  });
   t21.to('.imgbox', {duration:1,opacity:1,})


   let headings = gsap.utils.toArray(".coloranimation");
   headings.forEach(function (element, index) {
    gsap.to(element, {
      backgroundImage: "linear-gradient(to right, #007fae, #42d6e7)",
      duration: 5,
      ease: "none",
      scrollTrigger: {
        trigger: element,
        start: "top 75%",
        end: "top 25%",
        scrub: 1,
        markers: false
      }
    });
  });

//  // Initial setup for hidden/off-screen state
// gsap.set('.green-centrel2', { y: '100%', scale: 0.9 });
// gsap.set('.green-centrel3', { y: '100%', scale: 0.9 });
// gsap.set('.green-centrel4', { y: '100%', scale: 0.9 });
// gsap.set('.green-centrel5', { y: '100%', scale: 0.9 });

// gsap.set('.green-txt2', { y: '30px', opacity: 0 });
// gsap.set('.green-txt3', { y: '30px', opacity: 0 });
// gsap.set('.green-txt4', { y: '30px', opacity: 0 });
// gsap.set('.green-txt5', { y: '30px', opacity: 0 });

// // Master scroll timeline
// const masterTimeline = gsap.timeline({
//   scrollTrigger: {
//     trigger: '.green-centrel',
//     scrub: 2,
//     // markers: true,
//     toggleActions: 'restart none none none',
//     pin: true,
//     start: 'top',
//     end: '50%'
//   }
// });

// // Step 1 - First Image and Text
// const tl21 = gsap.timeline();
// tl21.to('.green-centrel1', { duration: 1,opacity:1 });
// tl21.to('.green-centrel1', { duration: 1, scale: 1 });

// const tl210 = gsap.timeline();
// tl210.to('.green-centrel-text', { duration: 1, opacity: 0 });
// tl210.to('.green-txt1', { duration: 1, opacity: 1 });
// tl210.to('.green-centrel', {
//   duration: 1,
//   background: "transparent linear-gradient(90deg, #0095D9 0%, #50BC80 100%) 0% 0% no-repeat padding-box"
// });

// const tl211 = gsap.timeline();
// tl211.to('.green-centrel1', { duration: 1, scale: 0.9 });

// // Step 2 - Second Image and Text
// const tl22 = gsap.timeline();
// tl22.to('.green-centrel2', { duration: 1, y: '0%', scale: 1 });
// tl22.to('.green-txt2', { duration: 1, y: '0%', opacity: 1 });

// const tl222 = gsap.timeline();
// tl222.to('.green-centrel2', { duration: 1, scale: 0.9 });

// // Step 3 - Third Image and Text
// const tl23 = gsap.timeline();
// tl23.to('.green-centrel3', { duration: 1, y: '0%', scale: 1 });
// tl23.to('.green-txt3', { duration: 1, y: '0%', opacity: 1 });

// const tl223 = gsap.timeline();
// tl223.to('.green-centrel3', { duration: 1, scale: 0.9 });

// // Step 4 - Fourth Image and Text
// const tl24 = gsap.timeline();
// tl24.to('.green-centrel4', { duration: 1, y: '0%', scale: 1 });
// tl24.to('.green-txt4', { duration: 1, y: '0%', opacity: 1 });

// const tl224 = gsap.timeline();
// tl224.to('.green-centrel4', { duration: 1, scale: 0.9 });

// // Step 5 - Fifth Image and Text
// const tl25 = gsap.timeline();
// tl25.to('.green-centrel5', { duration: 1, y: '0%', scale: 1 });
// tl25.to('.green-txt5', { duration: 1, y: '0%', opacity: 1 });

// // Add all to master timeline in sequence
// masterTimeline.add([tl21, tl210], ">");
// masterTimeline.add([tl211, tl22], ">");
// masterTimeline.add([tl222, tl23], ">");
// masterTimeline.add([tl223, tl24], ">");
// masterTimeline.add([tl224, tl25], ">");


   const tl = gsap.timeline({ 
    scrollTrigger: {
      trigger: '.esgperformance',
      scrub:2,
            // markers:true,
      toggleActions: 'restart none none none',
      pin:true,
      start: '0%',
      end:'800',
      invalidateOnRefresh: true
    }
  });
    // tl.to('.esgperformance h2', {duration:10,y:0,})
    //  tl.to('.scollnumber', {duration:10,opacity:1,})
   tl.to('.scollnumber', {duration:10,y:-300,})

   const cpsItems = document.querySelectorAll('.cps');

   gsap.set(cpsItems, {
    position: 'absolute',
    top: 0,
    left: 0,
    width: '100%',
  });

   cpsItems.forEach((el, i) => {
    if (i !== 0) {
    gsap.set(el, { y: '100%', opacity: 1 }); // Next ones hidden below
  }
});

   const t2 = gsap.timeline({
    scrollTrigger: {
      trigger: '.capitalsec',
      scrub: 2,
      pin: true,
      start: '0',
      end: `+=${cpsItems.length * 600}`,
      invalidateOnRefresh: true,
    // markers: true
    }
  });

   cpsItems.forEach((el, i) => {
    if (i > 0) {
      const prev = cpsItems[i - 1];

      const prevText = prev.querySelector('.col-md-6:nth-child(1)');
      const prevImage = prev.querySelector('.col-md-6:nth-child(2) img');

    // Slide current cps up into view
      t2.to(el, { y: '0%', opacity: 1, duration: 1 }, i);

    // Animate previous text upward
      t2.to(prevText, {
        y: '-100%',
        opacity:0,
        duration: 1,
        ease: 'power2.out'
      }, i);

    // Animate previous image scale and fade
      t2.to(prevImage, {
        scale: 1,
        opacity: 0,
        duration: 1,
        ease: 'power2.out'
      }, i);
    }
  });



 const t4 = gsap.timeline({ 
    scrollTrigger: {
      trigger: '.chem-stats',
      scrub:1,
      // markers:true,
      toggleActions: 'restart none none none',
      pin:true,
      start: 'top',
      end:'100%'
    }
  });
   t4.to('.chem-stat-inner', {duration:10,y:'0%',})

const t7 = gsap.timeline({ 
    scrollTrigger: {
      trigger: '.roadmap',
      scrub:1,
      // markers:true,
      toggleActions: 'restart none none none',
      pin:true,
      start: 'top',
      end:'100%'
    }
  });
   t7.to('.roadmap-inner', {duration:10,y:'0%',})

 const t5 = gsap.timeline({ 
    scrollTrigger: {
      trigger: '.bb-stats',
      scrub:1,
      // markers:true,
      toggleActions: 'restart none none none',
      pin:true,
      start: 'top',
      end:'100%'
    }
  });
   t5.to('.bb-stat-inner', {duration:10,y:'0%',})

 const t8 = gsap.timeline({ 
    scrollTrigger: {
      trigger: '.scl-msg',
      scrub:1,
      // markers:true,
      toggleActions: 'restart none none none',
      pin:true,
      start: 'top',
      end:'100%'
    }
  });
  t8.to('.scl-health', {duration:10,y:'0%',})
   t8.to('.scl-health1', {duration:10,y:'0%',})
 }
 
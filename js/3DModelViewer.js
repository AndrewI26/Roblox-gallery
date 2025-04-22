//edwin warriner
//march 29
// views 3d models of format glb and fbx and plays animations. Fbx does not load textures.
import * as THREE from "three";
import { FBXLoader } from "three/examples/jsm/loaders/FBXLoader.js";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls.js";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js";
//https://sbcode.net/threejs/fbx-animation/
//https://threejs.org/docs/#api/en/animation/AnimationAction
//resource was used

//This program does not actually run and is compiled. This is here to see the work done.

//defining canvas so display can be edited by css
const canvasArray = document.getElementsByClassName("view");

for (let i = 0; i < canvasArray.length; i++) {
  //iterates through class list to find associated data- fbx/glb file path
  const canvas = canvasArray[i];

  //initialize both file types
  let fbxPath;
  let glbPath;

  //new 3d scene
  const scene = new THREE.Scene();

  //size dependant on parent container
  //window will not grow to fill container after shrunk without using container dimensions
  const container = canvas.parentElement;
  const width = container.clientWidth;
  const height = container.clientHeight;

  //new display renderer


  const renderer = new THREE.WebGLRenderer({ canvas, antialias: true});
  renderer.setSize(width, height);
  renderer.shadowMap.enabled = true;

  //new perspective camera
  const camera = new THREE.PerspectiveCamera(40, width / height, 0.1, 100);
  camera.position.set(0.7, 0.75, 1.2);

  //add lighting for scene
  const light = new THREE.PointLight(0xffffff, 150);
  light.position.set(5, 5, 5);
  const backLigth = new THREE.PointLight(0xffffff, 50);
  backLigth.position.set(-5, 5, 5);
  //removes shadow artifacts
  light.shadow.bias = -0.0001;
  backLigth.shadow.bias = -0.0001;

  backLigth.castShadow = true;
  light.castShadow = true;

  scene.add(light);
  scene.add(backLigth);

  //background
  scene.background = new THREE.Color(0x606060);

  //enables floor grid
  const grid = new THREE.GridHelper(15, 30);
  scene.add(grid);

  //creates floor plane
  const planeGeometry = new THREE.PlaneGeometry(20, 20);
  const planeMaterial = new THREE.MeshStandardMaterial({ color: 0xffffff });
  const plane = new THREE.Mesh(planeGeometry, planeMaterial);
  plane.position.set(0, -0.001, 0);
  plane.rotateX(-Math.PI / 2);
  plane.receiveShadow = true;
  scene.add(plane);

  //enable zoom and rotate controls
  const controls = new OrbitControls(camera, renderer.domElement);
  controls.enableDamping = true;
  controls.target.set(0, 0.325, 0);
  //stops ability to move position
  controls.enablePan = false;

  //animation mixer
  let mixer;
  const clock = new THREE.Clock();

  //if element is an fbx file type
  if ((fbxPath = canvas.dataset.fbx)) {
    //fbxLoader
    const fbxLoader = new FBXLoader();
    fbxLoader.load("assets/models/fbx/" + fbxPath, (object) => {
      object.traverse((child) => {
        if (child.isMesh) {
          //white material
          child.material = new THREE.MeshStandardMaterial({ color: 0xffffff });
          //enable shadow casting and receiving
          child.castShadow = true;
          //looks better wihtout receiving
          child.receiveShadow = false;
        }
      });

      //scale and position
      object.scale.set(0.01, 0.01, 0.01);
      object.position.set(0, 0, 0);
      object.castShadow = true;
      scene.add(object);
      //checks animation
      if (object.animations) {
        mixer = new THREE.AnimationMixer(object);
        object.animations.forEach((clip) => {
          mixer.clipAction(clip).play();
        });
      }
    });
    //if glb
  } else if ((glbPath = canvas.dataset.glb)) {
    const glbLoader = new GLTFLoader();
    glbLoader.load("assets/models/glb/" + glbPath, (gltf) => {
      const model = gltf.scene;

      //scenes shadow behavior
      model.traverse((child) => {
        if (child.isMesh) {
          child.castShadow = true;
          child.receiveShadow = true;
        }
      });
      //scale
      model.scale.set(0.25, 0.25, 0.25);

      scene.add(model);

      //animations
      if (gltf.animations) {
        mixer = new THREE.AnimationMixer(model);
        gltf.animations.forEach((clip) => {
          mixer.clipAction(clip).play();
        });
      }
    });
  }

  function animate() {
    requestAnimationFrame(animate);

    if (mixer) {
      mixer.update(clock.getDelta());
    }
    //updates scene
    controls.update();
    renderer.render(scene, camera);
  }

  animate();

  //resize renderer
  window.addEventListener("resize", function (event) {
    //gets canvas contaier
    const container = canvas.parentElement;
    //resizes render window to container rescale
    //otherwise canvas wont will the container once shrunk. For some reason
    const width = container.clientWidth;
    const height = container.clientHeight;
    //update new size
    renderer.setSize(width, height);
    camera.aspect = width / height;
    camera.updateProjectionMatrix();
  });
}
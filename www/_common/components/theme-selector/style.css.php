theme-selector {
  display: grid;
  place-items: center;
  position: relative;
}

theme-selector>button {
  border: none;
  background-color: transparent;
  padding: 0;
  margin: 0;
  font: inherit;
  line-height: inherit;
  text-transform: none;
  -webkit-appearance: button;
  cursor: pointer;

  display: grid;
  width: 100%;
  height: 100%;
}

theme-selector svg {
  width: 100%;
  height: 100%;
  fill: var(--sunmoon-color, white);
  --sun-resize: .5s;
  --moon-hole-apparition: .5s;
  --moon-hole-disparition: .3s;
}

theme-selector .ray>path {
  stroke: var(--sunray-color, white);
}

theme-selector .sun-size,
theme-selector .moon-hole {
  will-change: transform;
  transform-style: preserve-3d;
}



/*************/
/* ANIMATION */
/*************/


/*<?php ob_start();?>*/
/************************************/
/* Thème clair - on affiche la lune */
/************************************/

/* - Étape 1 : le soleil s'agrandit */
theme-selector .sun-size {
  transform: scale(1);
  transition: transform var(--sun-resize) ease;
  transition-delay: 0s;
}

/* - Étape 2 : les rayons disparaissent */
theme-selector .ray {
  opacity: 0;
  transform: scale(.5);
  transition: transform .15s ease-in,
              opacity .15s ease-in;
  transition-delay: calc(var(--n) * 30ms);
}

/* - Étape 3 : le soleil devient lune */
theme-selector .moon-hole {
  transform: translate(0, 0);
  transition: transform var(--moon-hole-apparition) ease;
  transition-delay: calc(.5 * var(--sun-resize));
}
/*<?php $light = ob_get_clean();?>*/


/*<?php ob_start();?>*/
/***************************************/
/* Thème sombre - on affiche le soleil */
/***************************************/

/* - Étape 1 : la lune devient soleil */
theme-selector .moon-hole {
  transform: translate(40%, -40%);
  transition: transform var(--moon-hole-disparition) ease;
  transition-delay: 0s;
}

/* - Étape 2 : le soleil rétrécit */
theme-selector .sun-size {
  transform: scale(.5);
  transition: transform var(--sun-resize) ease;
  transition-delay: calc(.5 * var(--moon-hole-disparition));
}

/* - Étape 3 : les rayons apparaissent */
theme-selector .ray {
  opacity: 1;
  transform: scale(1);
  transition: transform .3s ease,
              opacity .3s ease;
  transition-delay: calc(.5 * var(--moon-hole-disparition) + .2s + var(--m, 0) * 60ms);
}
/*<?php $dark = ob_get_clean();?>*/


/******************************************/
/* DISTRIBUTION DES STYLES SELON LE THÈME */
/* 🔽🔽🔽🔽🔽🔽🔽🔽🔽🔽🔽🔽🔽🔽🔽🔽🔽 */

/********************/
/* Thème par défaut */
/*<?=$light?>*/

/****************************************/
/* @media (prefers-color-scheme: light) */
@media (prefers-color-scheme: light) {
  /*<?=$light?>*/
}

/****************************************/
/* @media (prefers-color-scheme: dark) */
@media (prefers-color-scheme: dark) {
  /*<?=$dark?>*/
}

/*****************************/
/* :root[data-theme="light"] */
/*<?=str_replace('theme-selector', ':root[data-theme="light"] theme-selector', $light)?>*/

/*****************************/
/* :root[data-theme="dark"] */
/*<?=str_replace('theme-selector', ':root[data-theme="dark"] theme-selector', $dark)?>*/

/* 🔼🔼🔼🔼🔼🔼🔼🔼🔼🔼🔼🔼🔼🔼🔼🔼🔼 */
/******************************************/



/**********/
/* POP-UP */
/**********/

.selector {
  display: grid;
  opacity: 0;
  pointer-events: none;
  grid-template-columns: auto 1fr;
  position: absolute;
  top: 100%;
  width: max-content;
  max-width: calc(100vw - 1.2rem);
  border: 2px solid var(--sunmoon-color);
  grid-row: 1;
  grid-column: 1;
}

.selector.on {
  display: grid;
  opacity: 1;
  pointer-events: auto;
}

.selector>input {
  grid-column: 1;
  align-self: center;
}

.selector>label {
  grid-column: 2;
  display: grid;
  grid-template-columns: 0 auto;
  grid-template-rows: repeat(auto-fill, 1fr);
}

.selector>label>span {
  grid-column: 2;
}

.selector[data-vertical="bottom"] {
  top: 100%;
}
.selector[data-vertical="top"] {
  top: unset;
  bottom: 100%;
}

.selector[data-horizontal="left"] {
  right: 0;
}
.selector[data-horizontal="right"] {
  left: 0;
}
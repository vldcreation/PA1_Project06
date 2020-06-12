<style>
td, th {
	text-align: left !important;
}
h1{
	font-size: 40px;
	font-weight:bold;
	margin: 0;
	color : black;
	text-align: left;
	text-transform: uppercase;
}
th {
	background-color: #F5F5F5;
}
.agendaku {
	margin: 0;
	border: solid thin #EEE;
	border-radius: 5px;
	text-align: center;
}
.agendaku:hover, .agendaku .tanggal:hover {
	background-color: #ffc;
}
.agendaku .tanggal {
	background-color: #FFF;
	padding: 10px;
	font-weight: bold;
	border-bottom: solid thin #EEE;
	border-radius: 5px 5px 0 0;
	font-size: 15px;
	min-height: 15px;
}
.agendaku .tahun {
	background-color: #F60;
	color: #FFF;
	padding: 10px;
	border-radius: 0 0 5px 5px;
	font-weight: bold;
	border: solid thin #EEE;
	font-size: 11px;
}
h4.judul {
	font-size: 14px;
	font-weight:bold;
	margin: 0;
	text-align: left;
	text-transform: uppercase;
}
.margin-20{
  margin-top:20px;
}

<style>
$bg: #fff;

.quote {
  display:inline-block;
  margin:1em;
  overflow:hidden;
}
  blockquote {
    background-color:$bg;
    border: solid 2px #757575;
    display: inline-block;
    margin: 0;
    padding: 1em;
    position: relative;
    &:before {
      background-color: $bg;
      bottom: -10%;
      content: "";
      left: 0;
      position: absolute;
      right: 0;
      top: -10%;
      transform: rotate(-15deg) skew(5deg);
    }
    .footer-quotes{
      display: block;
      font-style: italic;
      float: right;
    }
    cite {
      display: block;
      font-style: italic;
      text-align: right;
      &:before {
        content: "- ";
      }
    }
    > * {
      position: relative;
      z-index: 1;
    }
  }

.animated-border-quote {
  display:inline-block;
  margin:1em;
  max-width:20em;
  overflow:hidden;
  blockquote {
    background-color:$bg;
    border: solid 2px #757575;
    display: inline-block;
    margin: 0;
    padding: 1em;
    position: relative;
    &:before {
      animation:clockwise 30s infinite linear;
      background-color: $bg;
      bottom:10%;
      content: "";
      left: 0;
      opacity:.5;
      position: absolute;
      right: 0;
      top:10%;
    }
    &:after {
      animation:counter 30s infinite linear;
      background-color: $bg;
      bottom:10%;
      content: "";
      left: 0;
      opacity:.5;
      position: absolute;
      right: 0;
      top:10%;
    }
    cite {
      display: block;
      font-style: italic;
      text-align: right;
      &:before {
        content: "- ";
      }
    }
    > * {
      position: relative;
      z-index: 1;
    }
  }
}

@keyframes clockwise {
  0% {
    transform:rotate(0);
  }
  100% {
    transform:rotate(360deg);
  }
}

@keyframes counter {
  0% {
    transform:rotate(0);
  }
  100% {
    transform:rotate(-360deg);
  }
}

.animated-shadow-quote {
  display:inline-block;
  margin:1em;
  max-width:20em;
  position:relative;}
  blockquote {
    animation:shadows 2s linear infinite alternate;
    display:inline-block;
    margin:0;
    padding:1em;
    cite {
      display: block;
      font-style: italic;
      text-align: right;
      &:before {
        content: "- ";
      }
    }
  }

@keyframes shadows {
  0% {
    box-shadow:0 2px 4px -2px rgba(0,0,0,.25);
    transform:scale(.95);
  }
  100% {
    box-shadow:0 0 4px 2px rgba(0,0,0,.25);
    transform:scale(1);
  }
}

.square-brackets-quote {
  display:inline-block;
  font-family:sans-serif;
  margin:1em;
  max-width:20em; }
  blockquote {
    border:solid 1em #3C9EFA;
    display:inline-block;
    margin:0;
    padding:1em;
    position:relative;}
    &:before {
      background-color: $bg;
      bottom: -1em;
      content: "";
      left: 2em;
      position: absolute;
      right: 2em;
      top: -1em;
    }
    cite {
      color:#3C9EFA;
      display: block;
      font-size:small;
      font-style: normal;
      text-align: right;
      text-transform:uppercase;
    }
    > * {
      position: relative;
      z-index: 1;
    }


.giant-quotes-quote {
  display:inline-block;
  font-family:sans-serif;
  margin:1em;
  max-width:20em;
}
  blockquote{
    display:inline-block;
    margin:0;
    padding:1em;
    position:relative;
    &:before {
      color:#f90;
      content:"\201C";
      font-size:4em;
      left:0;
      line-height:.75em;
      position:absolute;
      top:0;
      transform:scale(2, 8);
      transform-origin:top;
    }
    &:after {
      color:#f90;
      content:"\201D";
      font-size:4em;
      line-height:.75em;
      position:absolute;
      right:0;
      top:0;
      transform:scale(2, 8);
      transform-origin:top;
    }
    > * {
      padding:0 2em;
    }
    cite {
      color:#c60;
      display: block;
      font-style: normal;
      text-align: right;
      text-transform:uppercase;
    }
  }
  blockquote span{
    border-bottom: 3px solid #3C9EFA;
    color : black;
    font-size : 24px;
    font-family:sans-serif;
  }

  .tittle{
    color : black;
    font-size : 24px;
  }
  .tittle::before{
    font-family: arial;
    display:block;
    position: absolute;
  }
  .tittle::after{
    content : "";
  }
  .tittle span{
    border-bottom: 3px solid #3C9EFA;
  }

</style>
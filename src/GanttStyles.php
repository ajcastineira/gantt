<?php
# NOTICE OF LICENSE
#
# This source file is subject to the Open Software License (OSL 3.0)
# that is available through the world-wide-web at this URL:
# http://opensource.org/licenses/osl-3.0.php
#
# -----------------------
# @author: Iván Miranda
# @version: 1.0.0
# -----------------------
# PHP Gantt Creator Class
# -----------------------

namespace Sincco\Tools;

final class GanttStyles extends \stdClass {

	public static function base() {
		return "<style>
		/* gantt styles */
		.gantt {
		  position: relative;
		  overflow: hidden;
		  color: #93a1a1;
		  background: #002b36; }

		.gantt * {
		  font-weight: normal;
		  margin: 0;
		  padding: 0; }

		.gantt li {
		  list-style: none; }

		/* optional title */
		.gantt figcaption {
		  position: absolute;
		  top: 25px;
		  left: 20px;
		  font-size: 20px;
		  color: white;
		  text-transform: uppercase;
		  letter-spacing: 4px; }

		/* sidebar */
		.gantt aside {
		  position: absolute;
		  left: 0;
		  bottom: 0;
		  top: 0;
		  width: 199px;
		  border-right: 1px solid #000b0d;
		  z-index: 2; }

		.gantt aside:before {
		  position: absolute;
		  right: -7px;
		  pointer-events: none;
		  width: 7px;
		  top: 0;
		  bottom: 0;
		  content: \"\";
		  border-left: 1px solid rgba(255, 255, 255, 0.03);
		  background: -webkit-linear-gradient(left, rgba(0, 43, 54, 0.7), rgba(0, 43, 54, 0));
		  background: -moz-linear-gradient(left, rgba(0, 43, 54, 0.7), rgba(0, 43, 54, 0));
		  background: linear-gradient(left, rgba(0, 43, 54, 0.7), rgba(0, 43, 54, 0));
		  z-index: 3; }

		.gantt aside .gantt-labels {
		  border-top: 1px solid #001f27; }

		.gantt aside .gantt-label strong {
		  display: block;
		  padding: 0 20px;
		  color: #93a1a1;
		  border-bottom: 1px solid #001f27;
		  overflow: hidden;
		  text-overflow: ellipsis;
		  white-space: nowrap; }

		/* data section */
		.gantt-data {
		  position: relative;
		  overflow-x: scroll;
		  margin-left: 200px;
		  white-space: nowrap; }

		/* data section header */
		.gantt header .gantt-months {
		  overflow: hidden; }

		.gantt header .gantt-month {
		  float: left;
		  text-align: center; }

		.gantt header .gantt-month strong {
		  display: block;
		  border-right: 1px solid #001f27;
		  border-bottom: 1px solid #001f27; }

		.gantt header .gantt-day span {
		  text-indent: 0;
		  text-align: center; }

		.gantt header .gantt-day.today span {
		  color: white; }

		/* data items */
		.gantt-item {
		  position: relative; }

		.gantt-days {
		  overflow: hidden; }

		.gantt-day {
		  float: left; }

		.gantt-day span {
		  display: block;
		  border-right: 1px solid #001f27;
		  border-bottom: 1px solid #001f27;
		  text-indent: -12000px; }

		.gantt-day.weekend span {
		  background: #073642; }

		/* data blocks */
		.gantt-block {
		  position: absolute;
		  top: 0;
		  z-index: 1;
		  margin: 4px;
		  border-radius: 3px;
		  -webkit-box-shadow: rgba(0, 0, 0, 0.9) 0 2px 6px, rgba(255, 255, 255, 0.2) 0 1px 0 inset;
		  -moz-box-shadow: rgba(0, 0, 0, 0.9) 0 2px 6px, rgba(255, 255, 255, 0.2) 0 1px 0 inset;
		  box-shadow: rgba(0, 0, 0, 0.9) 0 2px 6px, rgba(255, 255, 255, 0.2) 0 1px 0 inset;
		  opacity: .9; }

		.gantt-block-label {
		  display: block;
		  color: white;
		  padding: 5px 10px; }

		/* block colors */
		.gantt-block {
		  background: #268bd2; }

		.gantt-block.important {
		  background: #b58900; }

		.gantt-block.urgent {
		  background: #d33682; }

		/* today sign */
		.gantt time {
		  position: absolute;
		  top: 0;
		  width: 2px;
		  background: white;
		  bottom: 0;
		  z-index: 1000;
		  text-indent: -12000px;
		  -webkit-box-shadow: rgba(0, 0, 0, 0.3) 0 0 10px;
		  -moz-box-shadow: rgba(0, 0, 0, 0.3) 0 0 10px;
		  box-shadow: rgba(0, 0, 0, 0.3) 0 0 10px; }

		.gantt time:before {
		  position: absolute;
		  content: \"\";
		  top: 0;
		  left: -4px;
		  border-left: 5px solid transparent;
		  border-right: 5px solid transparent;
		  border-top: 5px solid white; }

		/* scrollbar styles */
		.gantt ::-webkit-scrollbar {
		  background: #002b36;
		  height: 10px; }

		.gantt ::-webkit-scrollbar-thumb {
		  background: #93a1a1;
		  -webkit-box-shadow: rgba(255, 255, 255, 0.1) 0 1px 0 inset;
		  -moz-box-shadow: rgba(255, 255, 255, 0.1) 0 1px 0 inset;
		  box-shadow: rgba(255, 255, 255, 0.1) 0 1px 0 inset; }

		/* selection styles */
		.gantt ::-moz-selection {
		  background: #fff;
		  color: #000; }

		.gantt ::selection {
		  background: #fff;
		  color: #000; }
		</style>";
	}

	public static function screen() {
		return "<style>
			@import url(http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700);
			article, aside, details, figcaption, figure, footer, header, hgroup, nav, section {
			  display: block; }

			* {
			  margin: 0;
			  padding: 0; }

			body {
			  font-family: \"Open Sans\", \"Helvetica Neue\", Helvetica, Arial, sans-serif;
			  font-size: 14px;
			  line-height: 22px;
			  background: #fdf6e3;
			  color: #657b83;
			  padding: 50px 0; }

			a {
			  color: #d33682;
			  text-decoration: none;
			  border-bottom: 1px solid rgba(0, 0, 0, 0.1); }

			header, article {
			  width: 500px;
			  margin: 0 auto;
			  padding: 50px 20px; }

			figure {
			  font-size: 12px;
			  line-height: 18px; }

			h1 {
			  font-size: 30px;
			  margin-bottom: 10px;
			  text-transform: uppercase;
			  color: #d33682; }

			h2 {
			  color: #b58900;
			  font-weight: normal;
			  margin-bottom: 10px; }

			p {
			  margin-bottom: 20px; }

			ul li {
			  list-style: square; }

			article {
			  padding-bottom: 100px; }

			pre {
			  font-family: \"Monaco\", \"Courier\", monospace;
			  position: relative;
			  overflow: auto;
			  background: #002b36;
			  color: #93a1a1;
			  box-shadow: rgba(0, 0, 0, 0.8) 0px 2px 10px inset;
			  padding: 20px;
			  font-size: 14px;
			  line-height: 24px;
			  margin-bottom: 24px;
			  border-radius: 3px; }

			pre code {
			  font-family: \"Monaco\", \"Courier\", monospace;
			  background: none;
			  padding: 0;
			  white-space: pre;
			  box-shadow: none;
			  border-radius: 0; }
		</style>";
	}
}
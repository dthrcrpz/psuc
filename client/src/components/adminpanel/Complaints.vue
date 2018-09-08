<template>
	<div class="complaints-component">
		<table id="complaints-table">
			<thead>
				<tr>
					<th>Show?</th>
					<th class="sortable" @click="sort(2)">Name</th>
					<th class="sortable" @click="sort(3)">Alias</th>
					<th class="sortable" @click="sort(4)">IP</th>
					<th class="sortable" @click="sort(5)">What</th>
					<th class="sortable" @click="sort(6)">About</th>
					<th class="sortable" @click="sort(7)">Target</th>
					<th class="sortable" @click="sort(8)">Date Submitted</th>
					<th class="sortable" @click="sort(9)">Message</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr class="complaints-item">
					<td>Wew</td>
					<td>wawas</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
					<td>Wew</td>
				</tr>
				<tr class="complaints-item">
					<td>ga</td>
					<td>vxc</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Wew</td>
					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
					<td>Wew</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	import $ from 'jquery'
	export default{
		methods: {
			sort(target){
				sortHTML('#complaints-table','.complaints-item', 'td:nth-child('+target+')')
			}
		}
	}

	function sortHTML(id, sel, sortvalue) {
	  var a, b, i, ii, y, bytt, v1, v2, cc, j;
	  // var a = getElements(id);
	  if (typeof id == "object") {
	    a = [id];
	  } else {
	    a = document.querySelectorAll(id);
	  }

	  for (i = 0; i < a.length; i++) {
		for (j = 0; j < 2; j++) {
		  cc = 0;
		  y = 1;
		  while (y == 1) {
			y = 0;
			b = a[i].querySelectorAll(sel);
			for (ii = 0; ii < (b.length - 1); ii++) {
			  bytt = 0;
			  if (sortvalue) {
				v1 = b[ii].querySelector(sortvalue).innerHTML.toLowerCase();
				v2 = b[ii + 1].querySelector(sortvalue).innerHTML.toLowerCase();
			  } else {
				v1 = b[ii].innerHTML.toLowerCase();
				v2 = b[ii + 1].innerHTML.toLowerCase();
			  }
			  if ((j == 0 && (v1 > v2)) || (j == 1 && (v1 < v2))) {
				bytt = 1;
				break;
			  }
			}
			if (bytt == 1) {
			  b[ii].parentNode.insertBefore(b[ii + 1], b[ii]);
			  y = 1;
			  cc++;
			}
		  }
		  if (cc > 0) {break;}
		}
	  }
	}	
</script>
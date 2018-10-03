<template>
	<div class="complaints-component">
		<table id="complaints-table">
			<thead>
				<tr>
					<th>Show on Public?</th>
					<th class="sortable" @click="sort(2)">Name <i class="fa fa-sort" aria-hidden="true"></i></th>
					<th class="sortable" @click="sort(3)">Alias <i class="fa fa-sort" aria-hidden="true"></i></th>
					<th class="sortable" @click="sort(4)">IP <i class="fa fa-sort" aria-hidden="true"></i></th>
					<th class="sortable" @click="sort(5)">What <i class="fa fa-sort" aria-hidden="true"></i></th>
					<th class="sortable" @click="sort(6)">About <i class="fa fa-sort" aria-hidden="true"></i></th>
					<th class="sortable" @click="sort(7)">Target <i class="fa fa-sort" aria-hidden="true"></i></th>
					<th class="sortable" @click="sort(8)">Date Submitted <i class="fa fa-sort" aria-hidden="true"></i></th>
					<th class="sortable" @click="sort(9)">Message <i class="fa fa-sort" aria-hidden="true"></i></th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr class="complaints-item" v-for="c in complaints">
					<td>
						<label class="switch">
							<input type="checkbox" :checked="c.show == 1">
							<span class="slider round"></span>
						</label>
					</td>
					<td>{{ c.name }}</td>
					<td>{{ c.alias }}</td>
					<td>{{ c.ip }}</td>
					<td>{{ c.way }}</td>
					<td>{{ c.about }}</td>
					<td>{{ c.target }}</td>
					<td>{{ c.created_at }}</td>
					<td>{{ c.message }}</td>
					<td>
						<button><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
					</td>
				</tr>
				<tr class="complaints-item" v-for="c in complaints">
					<td>
						<label class="switch">
							<input type="checkbox" :checked="c.show == 1">
							<span class="slider round"></span>
						</label>
					</td>
					<td>{{ c.name }}</td>
					<td>{{ c.alias }}</td>
					<td>{{ c.ip }}</td>
					<td>{{ c.way }}</td>
					<td>{{ c.about }}</td>
					<td>{{ c.target }}</td>
					<td>{{ c.created_at }}</td>
					<td>{{ c.message }}</td>
					<td>
						<button><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	import db from '../../services/firebase'
	export default{
		data(){
			return{
				complaints: []
			}
		},
		methods: {
			sort(target){
				sortHTML('#complaints-table','.complaints-item', 'td:nth-child('+target+')')
			},
		},
		mounted(){
			let me = this
			me.$parent.isLoading = 1
			me.$binding('complaints', db.collection('complaints'))
			.then(() => {
				me.$parent.isLoading = 0
			})
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
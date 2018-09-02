'use strict'

const Route = use('Route')

Route.get('/', ({ request }) => {
  return { greeting: 'Hello world in JSON' }
})

Route.post('/complaints', async ({request}) => {
	return 'pakyu'
})
Route.get('/complaints', async ({request}) => {
	return 'gago'
})
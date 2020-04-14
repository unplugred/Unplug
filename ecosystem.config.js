module.exports = {
	apps : [{
		name: 'unplug',
		script: './unplug/server.js',
		autorestart: true,
		watch: false,
		max_memory_restart: '1G',
		error_file: './logs/error.log',
		out_file: './logs/out.log',
		log_file: './logs/combined.log',
		time: true,
		combine_logs: true,
		env: {
			NODE_ENV: 'development'
		},
		env_production: {
			NODE_ENV: 'production'
		}
	},{
		name: 'dream buster',
		script: './dreambuster/server.js',
		autorestart: true,
		watch: false,
		max_memory_restart: '1G',
		error_file: './logs/error.log',
		out_file: './logs/out.log',
		log_file: './logs/combined.log',
		time: true,
		combine_logs: true,
		env: {
			NODE_ENV: 'development'
		},
		env_production: {
			NODE_ENV: 'production'
		}
	}]
};

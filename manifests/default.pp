$apache = ['apache2', 'apache2.2-common']
$php = ['php5', 'php5-mysql', 'libapache2-mod-php5']

exec { "apt-get update":
  path => "/usr/bin",
}

service { "apache2":
  ensure  => "running",
  require => Package[$apache], 
}

file { "/var/www/sample-webapp":
  ensure  => "link",
  target  => "/vagrant/sample-webapp",
  require => Package["apache2"],
  notify  => Service["apache2"],
}

file { "/var/www/prime-number":
  ensure  => "link",
  target  => "/vagrant/prime-number",
  require => Package["apache2"],
  notify  => Service["apache2"],
}

package { $apache:
  require => Exec["apt-get update"],
  notify  => Package[$php],
}

package { $php: 
  require => Package[$apache],
}

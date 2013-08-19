## Installation

Follow these steps:

* Get your api-key by contact Ratsit http://www.ratsit.se/Content/API_Webservice.aspx
* [Download the latest release](https://github.com/pontusab/Ratsit/archive/master.zip).
* Clone the repo: `git clone git://github.com/pontusab/Ratsit.git`.
* Install via Composer in your project: `curl -s http://getcomposer.org/installer | php`
* Install Ratsit: `php composer.phar install`
* Autoload Ratsit:

```
require 'vendor/autoload.php';

use Ratsit\Ratsit as Ratsit;

Ratsit::$service  = 'GetPersonInformationPackage';
Ratsit::$apiKey   = '';
Ratsit::$packages = 'small 1';

$Ratsit = new Ratsit;

$response = $Ratsit->searchPerson('personal number');

print_r( $response );
```

## Authors

**Pontus Abrahamsson**

+ [http://twitter.com/pontusab](http://twitter.com/pontusab)
+ [http://github.com/pontusab](http://github.com/pontusab)

## Copyright and license

Copyright 2013 Pontus Abrahamsson.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this work except in compliance with the License.
You may obtain a copy of the License in the LICENSE file, or at:

  [http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.




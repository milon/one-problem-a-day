---
extends: _layouts.post
section: content
title: Making file names unique
problemUrl: https://leetcode.com/problems/making-file-names-unique/
date: 2022-11-16
categories: [array-and-hashmap]
---

We will use a hashmap to store the count of each file name. We will iterate over all the file names and if the file name is not present in the hashmap, we will add it to the result. If the file name is present in the hashmap, we will add the count to the file name and add it to the result. We will increment the count of the file name in the hashmap.

```python
class Solution:
    def getFolderNames(self, names: List[str]) -> List[str]:
        result = []
        count = defaultdict(int)
        for name in names:
            if name not in count:
                result.append(name)
                count[name] += 1
            else:
                while name+'('+str(count[name])+')' in count:
                    count[name] += 1
                result.append(name+'('+str(count[name])+')')
                count[name+'('+str(count[name])+')'] += 1
        return result
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
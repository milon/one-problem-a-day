---
extends: _layouts.post
section: content
title: Find original array from doubled array
problemUrl: https://leetcode.com/problems/find-original-array-from-doubled-array/
date: 2022-09-15
categories: [array-and-hashmap]
---

We will first count the number of elements in the changed array. Then we will look for 0. If the count of 0 is odd, we return empty array, else we add half of them in our result. Then we sort the keys of the count hashmap, iterate over them, if we don't found a match, or the count doesn't align we return empty array. Else we add them to our result and remove them from the hashmap. We return our result after the iteration is done.

```python
class Solution:
    def findOriginalArray(self, changed: List[int]) -> List[int]:
        count = collections.Counter(changed)
        
        zeros, remainder = divmod(count[0], 2)
        if remainder:
            return []
        result = [0] * zeros
        
        for n in sorted(count.keys()):
            if count[n] > count[2*n]:
                return []
            
            count[2*n] -= count[n]
            result.extend([n] * count[n])
        
        return result
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`
---
extends: _layouts.post
section: content
title: Removing minimum number of magic beans
problemUrl: https://leetcode.com/problems/removing-minimum-number-of-magic-beans/
date: 2022-11-11
categories: [array-and-hashmap]
---

We will sort the beans. Then for each element, we will take the `totalSum-((arrLen-currIdx)*currNum)` and take the minimum of all such values.

```python
class Solution:
    def minimumRemoval(self, beans: List[int]) -> int:
        beans.sort()
        total = sum(beans)
        length = len(beans)
        
        remove = math.inf
        for i, bean in enumerate(beans):
            remove = min(remove, total-(length-i)*bean)
        return remove
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`
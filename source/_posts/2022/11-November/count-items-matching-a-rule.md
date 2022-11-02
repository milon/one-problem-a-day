---
extends: _layouts.post
section: content
title: Count items matching a rule
problemUrl: https://leetcode.com/problems/count-items-matching-a-rule/
date: 2022-11-02
categories: [array-and-hashmap]
---

We will iterate over the items and check if the rule matches. If it does, we increment the count.

```python
class Solution:
    def countMatches(self, items: List[List[str]], ruleKey: str, ruleValue: str) -> int:
        d = {'type': 0, 'color': 1, 'name': 2}
    
        count = 0
        for item in items:
            if item[d[ruleKey]] == ruleValue:
                count += 1
        
        return count
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`
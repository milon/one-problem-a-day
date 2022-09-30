---
extends: _layouts.post
section: content
title: Dota2 senate
problemUrl: https://leetcode.com/problems/dota2-senate/
date: 2022-09-30
categories: [greedy, queue]
---

We will take 2 queues one for dire and one for radiants which keeps their indexes. We pop from both queue whichever is larger(y) index we will bann that. and append smaller_element (x)+ idx as this element will be candidate for next round.

```python
class Solution:
    def predictPartyVictory(self, senate: str) -> str:
        R = collections.deque()
        D = collections.deque()
        
        n = len(senate)
        
        for idx, senator in enumerate(senate):
            R.append(idx) if senator == 'R' else D.append(idx)
        
        while R and D:
            x = R.popleft()
            y = D.popleft()
            
            R.append(x+n) if x<y else D.append(y+n)
        
        return "Radiant" if R else "Dire"
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
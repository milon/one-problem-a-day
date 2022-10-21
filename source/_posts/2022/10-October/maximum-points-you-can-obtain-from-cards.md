---
extends: _layouts.post
section: content
title: Maximum points you can obtain from cards
problemUrl: https://leetcode.com/problems/maximum-points-you-can-obtain-from-cards/
date: 2022-10-20
categories: [greedy]
---

We will use two pointers to keep track of the maximum points we can obtain. We will start with the first k cards and the last k cards. Then we will move the pointers to the right and left and check if the sum of the cards we have is greater than the current maximum. We will keep doing this until we have used all the cards.

```python
class Solution:
    def maxScore(self, cardPoints: List[int], k: int) -> int:
        _sum = sum(cardPoints[:k])
        res = _sum
        for i in range(1, k+1):
            _sum += cardPoints[-i] - cardPoints[k-i]
            res = max(res, _sum)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`
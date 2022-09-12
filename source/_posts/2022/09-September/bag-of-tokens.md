---
extends: _layouts.post
section: content
title: Bag of tokens
problemUrl: https://leetcode.com/problems/bag-of-tokens/
date: 2022-09-12
categories: [two-pointers]
---

We will first sort the tokens and take 2 pointers. If the value of the left pointer token is less than our power, we face down the token, so our score increase, we will also keep a running max score. If our score is already greater than 1, then we face up the token and increase our power and decrease our score. If neither is possible, we break the loop. Finally we return our running max score as result.

```python
class Solution:
    def bagOfTokensScore(self, tokens: List[int], power: int) -> int:
        tokens.sort()
        
        l, r = 0, len(tokens)-1
        score, maxScore = 0, 0
        while l <= r:
            if tokens[l] <= power:
                score += 1
                power -= tokens[l]
                maxScore = max(maxScore, score)
                l += 1
            elif score >= 1:
                score -= 1
                power += tokens[r]
                r -= 1
            else:
                break
        
        return maxScore
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`